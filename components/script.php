

    <script src="assets/js/jq.min.js"></script>
    <script src="assets/js/toastr.min.js"></script>
    <script>
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "2000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      }
    <?php include 'components/message.php'; ?>
     $('input.number:text').on('input',(e)=>{
      // let stat=isNumeric(e.target.value)
      // // e.target.style.color=(stat?'black':'red')
      // let content=stat?'':'This should be digits'
      // e.target.nextElementSibling.innerHTML=content
      // if(e.target.value=='') e.target.nextElementSibling.innerHTML=''
      allow_number(e);
     })
     
     $('input.alpha:text').on('input',(e)=>{
      allow_alphabets(e);
     })

     $('input:file').on('change',(e)=>{
      let stat=validate_fileupload(e.target.files)
      e.target.style.color=(stat?'black':'red')
      if(stat!==true)
        e.target.nextElementSibling.innerHTML=`${stat}`
      else
        e.target.nextElementSibling.innerHTML=``
     })
     function allow_alphabets(e){
        let textInput = e.target.value;
        textInput = textInput.replace(/[^A-Za-z ]*$/gm, ""); 
        e.target.value = textInput;
    }
    function allow_number(e){
        let textInput = e.target.value;
        textInput = textInput.replace(/[^0-9 ]*$/gm, ""); 
        e.target.value = textInput;
    }
    function isNumeric(str) {
      if (typeof str != "string") return false // we only process strings!  
      return !isNaN(str) && // use type coercion to parse the _entirety_ of the string (`parseFloat` alone does not do this)...
            !isNaN(parseFloat(str)) // ...and ensure strings of whitespace fail
    }
    function validate_fileupload(files)
    {
      for(let i=0;i<files.length;i++){
        let file=files[i];
        var allowed_extensions = new Array("jpg","png","gif");
        let ext=file.name.split('.').pop().toLowerCase();
        if(!allowed_extensions.indexOf(ext))
          return file.name+' filetype is not allowed'
        if(file.size>2000*1000)
          return file.name+' filetype is not allowed'
      }
      return true;
    }
    </script>
