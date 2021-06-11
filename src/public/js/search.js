(function () {
    class InstantSearch {
        /**
         * Initialises the instant search bar. Retrieves and creates elements.
         *
         * @param {HTMLElement} instantSearch The container element for the instant search
         * @param {InstantSearchOptions} options A list of options for configuration
         */
        constructor(instantSearch, options) {
            this.options = options;
            this.elements = {
                main: instantSearch,
                input: instantSearch.querySelector(".instant-search__input"),
                resultsContainer: document.createElement("div")
            };

            this.elements.resultsContainer.classList.add(
                "instant-search__results-container"
            );
            this.elements.main.appendChild(this.elements.resultsContainer);

            this.addListeners();
        }

        /**
         * Adds event listeners for elements of the instant search.
         */
        addListeners() {
            let delay;

            this.elements.input.addEventListener("input", () => {
                clearTimeout(delay);

                const query = this.elements.input.value;

                delay = setTimeout(() => {
                    if (query.length <= 0) {
                        this.populateResults([]);
                        return;
                    }

                    const results = this.options.searchFunction(query);
                    this.populateResults(results);
                }, 500);
            });

            this.elements.input.addEventListener("focus", () => {
                this.elements.resultsContainer.classList.add(
                    "instant-search__results-container--visible"
                );
            });

            this.elements.input.addEventListener("blur", () => {
                this.elements.resultsContainer.classList.remove(
                    "instant-search__results-container--visible"
                );
            });
        }

        /**
         * Updates the HTML to display each result under the search bar.
         *
         * @param {Object[]} results
         */
        populateResults(results) {
            // Clear all existing results
            while (this.elements.resultsContainer.firstChild) {
                this.elements.resultsContainer.removeChild(
                    this.elements.resultsContainer.firstChild
                );
            }

            // Update list of results under the search bar
            for (const result of results) {
                this.elements.resultsContainer.appendChild(
                    this.createResultElement(result)
                );
            }
        }

        /**
         * Creates the HTML to represents a single result in the list of results.
         *
         * @param {Object} result An instant search result
         * @returns {HTMLAnchorElement}
         */
        createResultElement(result) {
            const anchorElement = document.createElement("a");

            anchorElement.classList.add("instant-search__result");
            anchorElement.insertAdjacentHTML(
                "afterbegin",
                this.options.templateFunction(result)
            );

            // If provided, add a link for the result
            if ("href" in result) {
                anchorElement.setAttribute("href", result.href);
            }

            return anchorElement;
        }

        /**
         * Shows or hides the loading indicator for the search bar.
         *
         * @param {boolean} b True will show the loading indicator, false will not
         */
        setLoading(b) {
            this.elements.main.classList.toggle("instant-search--loading", b);
        }
    }

    // Prepare search cache    
    let searchCache = undefined;
    const localStorage = window.localStorage;

    const searchCacheText = localStorage.getItem('searchCache');
    if (searchCacheText) {
        searchCache = JSON.parse(searchCacheText);
        console.log('Cache loaded');
    } else {
        async function getProductList() {
            try {
                const result = await fetch('/api/products/getSearchData');
                const productList = await result.text();
                localStorage.setItem('searchCache', productList);

                searchCache = JSON.parse(productList);
            } catch (error) {
                console.log('Error fetching product list');
            }
        }

        // Fetch product list
        console.log('Fetching product list...');
        getProductList();
    }

    // Search box implementation
    function searchInList(q, list) {
        function escapeRegExp(s) {
            return s.replace(/[-/\\^$*+?.()|[\]{}]/g, "\\$&");
        }
        const words = q
            .split(/\s+/g)
            .map(s => s.trim())
            .filter(s => !!s);
        const hasTrailingSpace = q.endsWith(" ");
        const searchRegex = new RegExp(
            words
                .map((word, i) => {
                    if (i + 1 === words.length && !hasTrailingSpace) {
                        // The last word - ok with the word being "startswith"-like

                        return `(?=.*\\b${escapeRegExp(word)})`;
                    } else {
                        // Not the last word - expect the whole word exactly
                        return `(?=.*\\b${escapeRegExp(word)}\\b)`;
                    }
                })
                .join("") + ".+",
            "gi"
        );

        return list.filter(item => {
            return searchRegex.test(item.name);
        });
    }

    const searchProductsElement = document.querySelector("#searchProducts");
    const instantSearchProducts = new InstantSearch(searchProductsElement, {
        searchFunction: (query) => {
            return searchInList(query, searchCache).map(item => {
                return {
                    href: `/products/view/${item.id}`,
                    name: item.name
                }
            });
        },
        templateFunction: (result) => {
            return `
              <div class="instant-search__title">${result.name}</div>
            `;
        }
    });
})();