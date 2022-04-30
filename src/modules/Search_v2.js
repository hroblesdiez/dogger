import $ from 'jquery';

class Search {
    //Describe and create the object

    constructor() {
        this.addSearchHtml();
        this.resultsDiv = $("#search-results");
        this.openButton = $(".search-button");
        this.closeButton = $(".close-search-icon");
        this.searchOverlay = $(".search-input");
        this.searchField = $("#search-term");
        this.search = $(".search");
        this.previousValue;
        this.events();
        this.isOverlayOpen = false;
        this.typingTimer;
        
    }


    // Events
        events() {
            this.openButton.on("click",this.openOverlay.bind(this));
            this.openButton.on("mouseover",this.openOverlay.bind(this));
            this.closeButton.on("click",this.closeOverlay.bind(this));
            $(document).on("keydown", this.keyPressDispatcher.bind(this));
            this.searchField.on("keydown", this.getResults.bind(this));
            //this.searchField.on("keyup", this.typingLogic.bind(this));
            
        }


    //Methods (function, action...)

    // typingLogic() {
      
    //     if(this.searchField.val() != this.previousValue) {
    //         clearTimeout(this.typingTimer);
            
    //         if(this.searchField.val()) {
    //             this.typingTimer = setTimeout(this.getResults.bind(this),750);
    //         } else {
    //             this.resultsDiv.html("");
    //         }

    //     }
    //     this.previousValue = this.searchField.val();
    // }

    getResults() {
        
            $.getJSON(doggerData.root_url + '/wp-json/dogger/v1/search?term=' + this.searchField.val(), (results) => {
                this.resultsDiv.html(`
                    <div class="lg:flex lg:flex-row lg:items-start lg:justify-around lg:flex-wrap">
                        <div class="">
                            <h2 class="">Blog</h2>
                            ${results.post.length ? '<ul>' : '<p>No results matches your search</p>'}
                            ${results.post.map(item => `<li><a href="${item.link}">${item.title}</a></li>`).join('')}
                            ${results.post.length ? '</ul>'  : '' }
                            <h2 class="">Our Dogs</h2>

                        </div>
                        <div class="">
                            <h2 class="">Our Services</h2>

                            <h2 class="">Our Team</h2>

                            <h2 class="">Our Customers</h2>

                        </div>
                        <div class="">
                            <h2 class="">General Info</h2>
                        </div>
                    </div>
                
                
                `);
            });
    }

    keyPressDispatcher(e) {

        if(e.keyCode === 83 && !this.isOverlayOpen && !$("input,textarea").is(":focus")) {
          
            this.openOverlay();
            
        }
        if(e.keyCode === 27 && this.isOverlayOpen) {
           
            this.closeOverlay();
        }
    }

    openOverlay() {
        $("body").addClass("overflow-hidden");
        this.searchField.val("");
        this.searchOverlay.removeClass("hidden");
        setTimeout(() => this.searchField.focus(), 301);
        this.isOverlayOpen = true;
        return false; //to prevent the default behaviour of a link 
       
    }
    closeOverlay() {
        $("body").removeClass("overflow-hidden");
        this.searchField.val("");
        this.resultsDiv.addClass("hidden");
        setTimeout(() => this.searchField.focus(), 301);
        this.isOverlayOpen = false;
        
    }

    addSearchHtml() {
        $("body").append(`
            <div class="absolute top-[75px] w-screen bg-primary" id="search-results"></div>
        `)
    }

}

export default Search