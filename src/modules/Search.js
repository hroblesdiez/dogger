
class Search {
    constructor() {
        this.cleanSearchButton = document.querySelector('#search-button-clean');
        this.inputSearch = document.querySelector('#input-search');
        this.events();
    }
    events() {
        this.inputSearch.addEventListener ('input', () => {
            this.cleanSearchButton.classList.remove('hidden');
        }); 

        this.cleanSearchButton.addEventListener('click', () => {
           if(this.inputSearch.value !== '') {
            this.inputSearch.value = '';
            this.inputSearch.focus();
        }
        });
        if (this.inputSearch.value !== '') {
            this.cleanSearchButton.classList.remove('hidden');
        }
    }
}


export default Search