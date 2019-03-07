import $ from 'jquery';


class MyNotes {
  constructor(){
    this.events();
  }

  events(){
    /**This lines means that whatever i click inside of '#my-note' <ul>
     * if the class match with the class .delete-note, or one of the others, 
     * then it triggs the function this.deleteNote or the others. to work the 
     * Edit, Delete and Save button when created, without reload the page.
     */
    $("#my-notes").on("click", ".delete-note", this.deleteNote);
    $("#my-notes").on("click", ".edit-note", this.editNote.bind(this));
    $("#my-notes").on("click", ".update-note", this.updateNote.bind(this));
    $(".submit-note").on("click", this.createNote.bind(this));
  }

  editNote(e){
    var thisNote = $(e.target).parents("li");

    if(thisNote.data("state") == "editable"){
      this.makeNoteReadonly(thisNote);
    }else{
      this.makeNoteEditable(thisNote);
    }
  }

  makeNoteEditable(thisNote){
    thisNote.find(".edit-note").html('<i class="fa fa-times" aria-hidden="true"></i> Cancel');
    thisNote.find(".note-title-field, .note-body-field")
            .removeAttr("readonly")
            .addClass("note-active-field");
    thisNote.find(".update-note").addClass("update-note--visible");
    thisNote.data("state", "editable");
  }

  makeNoteReadonly(thisNote){
    thisNote.find(".edit-note").html('<i class="fa fa-pencil" aria-hidden="true"></i> Edit');
    thisNote.find(".note-title-field, .note-body-field")
            .attr("readonly", "readonly")  // ('name', 'value')
            .removeClass("note-active-field");
    thisNote.find(".update-note").removeClass("update-note--visible");
    thisNote.data("state", "cancel");
  }

  //Methods  .ajax to controll what type (GET, POST, DELETE) i want to send.
  /**NONCE is a garantee that I was logged in and have the authorization to delete posts */
  deleteNote(e){
    var thisNote = $(e.target).parents("li");
    console.log("LOOK ", thisNote.data('id')); //To get the note id.
    
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);  //nonce is in functions.php
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
      type: 'DELETE',
      success: (response) => {
        thisNote.slideUp();
        console.log("Congrats..")
        console.log(response)
      },
      error: (response) =>{
        console.log("Sorry..")
        console.log(response)
      },

    })
  }

  updateNote(e){
    var thisNote = $(e.target).parents("li");
    console.log("LOOK ", thisNote.data('id')); //To get the note id.

    var ourUpdatedPost = {
      'title': thisNote.find(".note-title-field").val(),
      'content': thisNote.find(".note-body-field").val(),
    }
    
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);  //nonce is in functions.php
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/' + thisNote.data('id'),
      type: 'POST',
      data: ourUpdatedPost,
      success: (response) => {
        this.makeNoteReadonly(thisNote);
        console.log("Congrats..")
        console.log(response)
      },
      error: (response) =>{
        console.log("Sorry..")
        console.log(response)
      },

    })
  }

  // 'status': 'publish' make the note not a draft, but published..
  createNote(e){
    var ourNewPost = {
      'title': $(".new-note-title").val(),
      'content': $(".new-note-body").val(),
      'status': 'private'
    }
    
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-Nonce', universityData.nonce);  //nonce is in functions.php
      },
      url: universityData.root_url + '/wp-json/wp/v2/note/',
      type: 'POST',
      data: ourNewPost,
      success: (response) => {
        $(".new-note-title, .new-note-body").val('');
        $(`
        <li data-id="${response.id}"> <!-- Makes the ID lives in html -->
          <input readonly class="note-title-field" value="${response.title.raw}">
          <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</span>
          <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</span>
          <textarea readonly class="note-body-field">${response.content.raw}</textarea>
          <span class="update-note btn btn--blue btn--small"><i class="fa fa-arrow-right" aria-hidden="true"></i> Save</span>
        </li>
        `).prependTo("#my-notes").hide().slideDown();
        console.log("Congrats..")
        console.log(response)
      },
      error: (response) =>{
        console.log("Sorry..")
        console.log(response)
      },

    })
  }



}


export default MyNotes;