import $ from 'jquery';

class Like {

  constructor(){
    this.events();
  }


  events(){
    $(".like-box").on("click", this.ourClickDispatcher.bind(this));
  }


//Methods
ourClickDispatcher(e){
  //Garentees that the click is in the right box in multiple elements.
  var currentLikeBox = $(e.target).closest(".like-box");

  if(currentLikeBox.attr("data-exists") == "yes"){
    this.deleteLike(currentLikeBox);
  }else{
    this.createLike(currentLikeBox);
  }

}

createLike(currentLikeBox){
  $.ajax({
    beforeSend: (xhr) => {
      xhr.setRequestHeader('X-WP-Nonce', universityData.nonce); // this code proves who we are to wordpress..
    },
    url: universityData.root_url + '/wp-json/university/v1/manageLike',  // ?professotId=789
    type: 'POST',
    data: {
      'professorId': currentLikeBox.data('professor')  // same as ?professotId=789
    },
    success: (response) =>{
      currentLikeBox.attr('data-exists', 'yes');
      var likeCount = parseInt(currentLikeBox.find('.like-count').html(), 10); // current number of likes
      likeCount++;
      currentLikeBox.find('.like-count').html(likeCount);//update the like count in web.
      currentLikeBox.attr('data-like', response); //response will send the ID number
      console.log(response)
    },
    error: (response) =>{
      console.log(response)
    }
  })
}

deleteLike(currentLikeBox){
  $.ajax({
    beforeSend: (xhr) => {
      xhr.setRequestHeader('X-WP-Nonce', universityData.nonce); // this code proves who we are to wordpress..
    },
    url: universityData.root_url + '/wp-json/university/v1/manageLike',
    data: {'like': currentLikeBox.attr('data-like')},
    type: 'DELETE',
    success: (response) =>{
      currentLikeBox.attr('data-exists', 'no');
      var likeCount = parseInt(currentLikeBox.find('.like-count').html(), 10); // current number of likes
      likeCount--;
      currentLikeBox.find('.like-count').html(likeCount);//update the like count in web.
      currentLikeBox.attr('data-like', ''); //response will send the ID number
      console.log(response)
    },
    error: (response) =>{
      console.log(response)
    }
  })
}


}

export default Like;