import $ from 'jquery';


class Search {

  //1- Describe and create/initiate the object
  constructor(){
    this.addSearchHTML();
    this.resultsDiv = $('#search-overlay__results');
    this.openButton = $('.js-search-trigger');
    this.closeButton = $('.search-overlay__close');
    this.searchOverlay = $('.search-overlay');
    this.searchField = $('#search-term');
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }

  //2- Events
  events(){
    this.openButton.on('click', this.openOverlay.bind(this));
    this.closeButton.on('click', this.closeOverlay.bind(this));
    $(document).on('keyup', this.keyPressDispatcher.bind(this));
    this.searchField.on('keyup', this.typingLogic.bind(this));
  }


  //3- Methods

  typingLogic(){
    if(this.searchField.val() != this.previousValue){
      clearTimeout(this.typingTimer); //reset timeout
      if(this.searchField.val()){
        if(!this.isSpinnerVisible){ //avoid spinner reload all the time..
          this.resultsDiv.html('<div class="spinner-loader"></div>'); // loader spinner..
          this.isSpinnerVisible = true;
        }
      this.typingTimer = setTimeout(this.getReaults.bind(this), 750);
      }else{
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }        
    }
    this.previousValue = this.searchField.val();
  }

  getReaults(){
    // the rest of url is defined in functions.php
    $.when(
      $.getJSON(universityData.root_url + '/wp-json/wp/v2/posts/?search=' + this.searchField.val()), 
      $.getJSON(universityData.root_url + '/wp-json/wp/v2/pages/?search=' + this.searchField.val()))
      .then((posts, pages)=>{
      var combineResults = posts[0].concat(pages[0]); //0 -> first part of request that correspond to the JSON the rest is other info..
        this.resultsDiv.html(`
          <h2 class="search-overlay__section-title">General Information</h2>
          ${combineResults.length ? '<ul class="min-list link-list">' : '<p>No general information matches this search</p>'}
            ${combineResults.map(item => `
              <li><a href="${item.link}">${item.title.rendered}</a></li>
            `).join('')}
          ${combineResults.lenght ? '</ul>' : ''}
        `);
      this.isSpinnerVisible = false;
    }, (err) => {
      console.log(err);      
      this.resultsDiv.html(`<p>Unexpected error! ${err.status + ' : ' +err.statusText}</p>`)
    });

  }


  keyPressDispatcher(event){
    //press S to open
    if(event.keyCode == 83 && !this.isOverlayOpen && !$('input, textarea').is(':focus')){
      this.openOverlay();
    }
    //press esc to close
    if(event.keyCode == 27 && this.isOverlayOpen){
      this.closeOverlay();
    }    
  }

  openOverlay(){
    this.searchOverlay.addClass('search-overlay--active');
    $('body').addClass("body-no-scroll");
    this.searchField.val('');
    setTimeout(() => this.searchField.focus(), 301); // set focus in input field search..
    console.log('OPEN');    
    this.isOverlayOpen = true;
  }

  closeOverlay(){
    this.searchOverlay.removeClass('search-overlay--active'); 
    $('body').removeClass("body-no-scroll");
    console.log('CLOSE');    
    this.isOverlayOpen = false;
  }

  //SEARCH OVERLAY HTML
  addSearchHTML(){
    $('body').append(`
      <div class="search-overlay">
        <div class="search-overlay__top">
          <div class="container">
            <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
            <input type="text" class="search-term" placeholder="What are you seraching for?" id="search-term">
            <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
          </div>
        </div>
    
        <div class="container">
          <div id="search-overlay__results"></div>
        </div>
      </div>
    `)
  }

}

export default Search;