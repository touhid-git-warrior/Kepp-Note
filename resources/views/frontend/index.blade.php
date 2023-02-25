@extends('frontend.master') @section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style type="text/css">
      
      .note_pannel{
        cursor: pointer;
      }
      .note_box h5{

        font-size: 15px;
      }

      .note_box{
        max-height: 300px;
        overflow-y: scroll; /* Show vertical scrollbar */

      }

      .show_note{

        border-radius: 10px;
        border: 5px solid #ecefed;
      }


      .dropdown-toggle::after {
    display: none!important;
  
  }

 


    </style>

<!-- Begin Page Content -->
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">


  <h1 class="h3 mb-0 text-gray-800">Welcome {{ Auth::guard('web')->user()->name }}</h1>

  <form method="POST" action="{{ route('logout') }}"> @csrf <a class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
      {{ __('Log Out') }}
    </a>
  </form>



</div>

<!-- <a href="#" class="btn btn-primary"> Add Note </a> -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="ClearAfterImg()">
  Add Note
</button>

    <!-- <img src="https://cdn.dribbble.com/users/3976/screenshots/379268/marvel_loader.gif"> -->


  <div class="row py-5" id="note_add">

   <!-- <div class="load"> 

    <img src="https://cdn.dribbble.com/users/3976/screenshots/379268/marvel_loader.gif">

     </div> -->



    
<!--     <div class="col-lg-4 py-3 note_pannel">
      
    <div class="show_note card container" id="show_note">

      <div class="img_box">
     
        <div class="row" id="note_wrapper">

          <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

           <div class="col-lg-3 py-2">
          <img class="img-fluid" src="https://i0.wp.com/www.flutterbeads.com/wp-content/uploads/2022/01/add-image-in-flutter-hero.png?fit=2850%2C1801&ssl=1"> 
          </div>

        </div>
        
      </div>
      
      <div class="title_box py-3">
        
        <h3>This Is Title</h3>

      </div>

      <div class="note_box">
        
        <h5>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

        </h5>

      </div> 

    </div>

    </div> -->





  </div>


<!-- Insert Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Note</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="main-pannel">
          
            <div class="form-group">
              
              <input type="text" name="title" class="form-control title" id="title" placeholder="Title">

            </div>

            <div class="form-group">
              
              <!-- <input type="text"  class="form-control note"  placeholder="Take a note..."> -->

              <textarea class="form-control note" name="note" id="exampleFormControlTextarea1" rows="3" placeholder="Note..."></textarea>




            </div>

            <div class="form-group">
              
              <input type="file" name="image" class="form-control image" id="image" multiple>

            </div>

            <div id="img_show"></div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="closemodal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="SaveNote()">Add</button>
      </div>
    </div>
  </div>
</div>


<!-- Edate Modal -->
<div class="modal fade" id="edateModal" tabindex="-1" aria-labelledby="edateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edateModalLabel">My Note  </h5>

        <input type="hidden" class="not_id" id="not_id" value="">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="main-pannel">

          <div class="row" id="set_edt_img">
            
           <!--  <div class="col-lg-4">
              
              <img src="upload/cv_images/63f23e7db24b5banner-1.jpg" class="img-fluid my-4">

            </div> -->

          </div>
          

            <div class="form-group">
              
              <input type="text" name="title" class="form-control edt_title" id="edt_title" placeholder="Title">

            </div>

            <div class="form-group">
              
              <!-- <input type="text"  class="form-control note"  placeholder="Take a note..."> -->

              <textarea class="form-control edt_note" name="note" id="exampleFormControlTextarea1" rows="3" placeholder="Note..."></textarea>




            </div>

            <div class="form-group">
              
              <input type="file" name="image" class="form-control edt_image" id="edt_image" multiple>

            </div>

            <div class="img_show"></div>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="edtclosemodal" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="UpdateNote()">Update</button>
      </div>
    </div>
  </div>
</div>


 <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script type="text/javascript">
  
  function SaveNote() {

      let title = $('#title').val().trim();
      let note = $('.note').val().trim();

      if(title == ''){

        title = 'null';
       
      }

      if(note == ''){

        note = 'null';
       
      }

      axios.post('/addnote', {
      title: title,
      note: note
    })
  .then(function (response) {

    if(response.status == 200){

      let title = $('#title').val("");
      let note = $('.note').val("");


      SaveImage(response.data.id);

      setTimeout(function() {

          ShowNote();
        
      },1000)

      

      Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Note Add',
    showConfirmButton: false,
    timer: 1500
    })

    // let title = $('#title').val("");
    // let note = $('.note').val("");

    $('#closemodal').click();

  }

    
  })
  .catch(function (error) {
    console.log(error);
  });

      

  }



  function SaveImage(id) {

     
      let file = document.getElementById('image').files;


    for (var i = 0; i <= file.length; i++) {
      
      let mainFile = file[i];

      let file_data = new FormData();
      file_data.append('FileKey',mainFile);

      let config = {headers: {
          'Content-Type': 'multipart/form-data'
      }
    }

   


    axios.post('/addimages/'+id,file_data,config)
    .then(function (response) {
      console.log(response.data);

       let image = $('#image').val("");
        
    })
    .catch(function (error) {
      console.log(error);
    });


    }
 

  }




  function ShowNote(){

     $('#note_add').empty();

    axios.get('/getnote')
  .then(function (response) {
    // handle success

    if(response.status == 200){

       localStorage.setItem('data',  JSON.stringify(response.data));

      let jsonData = response.data;

      // $('.load').empty()

      $.each(jsonData,function(id,val){
        $('#note_add').append(`

          <div class="col-lg-4 py-3 note_pannel">

      
        <div class="show_note card container" id="show_note">

      <div role="group">
    <button style="float: right;" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-expanded="false" data-id="${val.id}">
      <i class="fa fa-ellipsis-v" aria-hidden="true"></i>

    </button>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#" onclick="DeleteNote(${val.id})">Delete</a>
     
    </div>
  </div>

    <div onclick="EdateNote(${val.id})" data-toggle="modal" data-target="#edateModal">

        <div class="img_box">

      <div class="row" id="note_wrapper">

     
        ${SetImage(val.multiimage)}

         </div>
        
      </div>
      
      <div class="title_box py-3">
        
        <h3>${(val.title == 'null')?'':val.title }</h3>

      </div>

      <div class="note_box">
        
        <h5>
        ${(val.note == 'null')?'':val.note }
        </h5>

      </div> 

    </div>

    </div>

    </div>

      

          `)
      });

  

      

    }
    
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .finally(function () {
    // always executed
  });


  }

    ShowNote();


  function SetImage(value){

    let getimg = "";

    $.each(value,function(id,value){

      getimg += `

          <div class="col-lg-3 py-2">
          <img style="width: 100px; height: 100px;" src="${value.multi_image}"> 
          </div>
    `

    })

     

    return getimg;

  }



</script>
<!-- Content Row -->
<script type="text/javascript">
  @if(Session::get('key') == 600)
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'Your CV Info Already Added',
    footer: ' <a href = "" >  </a>'
  })
  @endif
</script>
<script type="text/javascript">
  @if(Session::get('key') == 200)
  Swal.fire({
    icon: 'success',
    title: 'Optimized...',
    text: 'Optimized Sussfully',
    footer: ' <a href = "" >  </a>'
  })
  @endif
  @if(Session::get('key') == 410)
  Swal.fire({
    icon: 'success',
    title: 'Remove...',
    text: 'Your Cv Sussfully Remove',
    footer: ' <a href = "" >  </a>'
  })
  @endif
</script> 

<script type="text/javascript">
  
  function DeleteNote(id){
    
    // deletenote

    axios.get('/deletenote/'+id)
  .then(function (response) {
    // handle success
    if(response.data == 255){

      ShowNote();
    }
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .finally(function () {
      // always executed
    });

    }

</script>

  <!-- edate note -->

<script type="text/javascript">
  
    function EdateNote(id){

      // $('.not_id').html(id)

    $('#set_edt_img').empty()
    $('#edt_image').val("")
    $('.img_show').empty()


  axios.get('/edatenote/'+id)
  .then(function (response) {
    // handle success

  
     let notedata = response.data.note;

     let noteimg = response.data.noteimg;

     let titlecheckdata = (notedata.title == 'null')? '' :notedata.title

     let notecheckdata = (notedata.note == 'null')? '' :notedata.note

      let nid = $('.not_id').val(notedata.id);
      let title = $('.edt_title').val(titlecheckdata);
      let note = $('.edt_note').val(notecheckdata);

      
      // set_edt_img


       let getimg = "";

    $.each(noteimg,function(id,noteimg){

       $('#set_edt_img').append(`

            <div class="col-lg-4 mb-2">
              
              <img style="width: 100px; height: 100px;" src="${noteimg.multi_image}" class="my-4">
              <br/>
              <button class="btn btn-danger btn-sm" onclick="DeleteSinImg(${noteimg.id})"> <i class="fas fa-trash"></i> </button>

            </div>

        `)

    })

         

      // ShowNote();
    
    })
    .catch(function (error) {
      // handle error
      console.log(error);
    })
    .finally(function () {
      // always executed
    });

     
    }


    function UpdateNote() {

      let id = document.getElementById('not_id').value;
      let title = $('.edt_title').val();
      let note = $('.edt_note').val();

        if(title == ''){

        title = 'null';
       
      }

      if(note == ''){

        note = 'null';
       
      }



      axios.post('/updatenote/'+id, {
      title: title,
      note: note
    })
  .then(function (response) {

    if(response.status == 200){

      let title = $('.edt_title').val("");
      let note = $('.edt_note').val("");


      UpdateNoteImage(id);

       setTimeout(function() {

          ShowNote();
        
      },1000)

      Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Note Updated',
    showConfirmButton: false,
    timer: 1500
    })

    // let title = $('#title').val("");
    // let note = $('.note').val("");

    $('#edtclosemodal').click();

  }


    
  })
  .catch(function (error) {
    console.log(error);
  });

    }


    function UpdateNoteImage(id) {

   
      let file = document.getElementById('edt_image').files;


      for (var i = 0; i <= file.length; i++) {
      
      let mainFile = file[i];

      let file_data = new FormData();
      file_data.append('FileKey',mainFile);

      let config = {headers: {
          'Content-Type': 'multipart/form-data'
      }
    }

   

    axios.post('/updatenoteimage/'+id,file_data,config)
    .then(function (response) {
      console.log(response.data);

      let image = $('#edt_image').val("");

      // $('#note_add').empty();

      // ShowNote()

      
        
    })
    .catch(function (error) {
      console.log(error);
    });


    }


     // updatenote


    }

    function DeleteSinImg(id){



    axios.get('/deletesingleimage/'+id)
  .then(function (response) {
    // handle success

    EdateNote(response.data.note_id)

    ShowNote()

    // if(response.data == 255){

    //   EdateNote(id)

    // }
  })
  .catch(function (error) {
    // handle error
    console.log(error);
  })
  .finally(function () {
    // always executed
  });


    }


</script>

  <!-- after select image show -->

<script type="text/javascript">
      

      $(document).ready(function(){
   $('#image').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img class="m-2" />').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('#img_show').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });


      function ClearAfterImg(){

        $('#image').val("")

        $('#img_show').empty()

      }

      

</script>

 <!-- after select image show for edate -->

<script type="text/javascript">
  
    $(document).ready(function(){
   $('#edt_image').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img class="m-2" />').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element 
                      $('.img_show').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

</script>








@endsection
