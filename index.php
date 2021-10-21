
<?php header('location:lost.php') ?>

<!doctype html>
<html lang="en">

    <?php include 'components/headtag.php'; ?>
    
<body class="h-screen flex flex-col flex-1 overflow-hidden " style="background: #120C6E;">
    <?php include 'components/header.php' ?>
    <div class="flex flex-1">
        <?php include 'components/sidebar.php' ?>
        <div class="flex-1 flex flex-col items-strech  bg-gray-400 " >
        <div class="p-3 flex justify-between items-center">
            <div class="bg-gray-200 text-sm text-gray-500 leading-none border-2 border-gray-200 rounded-full inline-flex" id="viewtoggle">
            <button class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-l-full px-4 py-2 activeS" id="grid" onclick="toggle(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill-current w-4 h-4 mr-2"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                <span>Grid</span>
            </button>
            <button class="inline-flex items-center transition-colors duration-300 ease-in focus:outline-none hover:text-blue-400 focus:text-blue-400 rounded-r-full px-4 py-2" id="list" onclick="toggle(this)">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="fill-current w-4 h-4 mr-2"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                <span>List</span>
            </button>
            </div>
            <div class="px-3">
                <button class="bg-white text-gray-800 font-bold rounded border-b-2 border-green-500 hover:border-green-600 hover:bg-green-500 hover:text-white shadow-md py-2 px-6 inline-flex items-center">
                <span class="mr-2">Post</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="currentcolor" d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"></path>
                </svg>
                </button>
            </div>
        </div>
        <div class=" flex-1 flex flex-col" id="gridview">
            <div class="px-6 h-full opacity-100">
            
            <div class="h-full w-full flex justify-center">
                <div class="h-full">
                <img id="preview" class="mySlides image1 description h-full opacity-100 cursor-pointer" src="assets/img/1.gif" onclick="currentSlide(1)" alt="Dog's Nose">
                </div>
            </div>
            </div>
            <div class="h-24 w-full px-6">
            <div class="bg-blue-500 w-full h-full text-center text-white">
                <div id="caption"></div>
                <div id="descp"></div>
            </div>
            </div>
            <div class="h-64 w-full px-6 pb-6">
            <div class="bg-transparent w-full h-full">
                
            <!-- smaller images under description -->
            <div class="flex h-full justify-center overflow-x-auto z-0" id="slide">
                <img class="image1 description h-100 opacity-50 hover:opacity-100 cursor-pointer border-double border-4 border-light-blue-500" src="assets/img/1.gif" onclick="currentSlide(event)" alt="pic1">
                <img class="image2 description h-100 opacity-50 hover:opacity-100 cursor-pointer border-double border-4 border-light-blue-500" src="assets/img/1.gif" onclick="currentSlide(event)" alt="pic2">
                <img class="image2 description h-100 opacity-50 hover:opacity-100 cursor-pointer border-double border-4 border-light-blue-500" src="assets/img/1.png" onclick="currentSlide(event)" alt="pic3">
                <img class="image2 description h-100 opacity-50 hover:opacity-100 cursor-pointer border-double border-4 border-light-blue-500" src="assets/img/1.png" onclick="currentSlide(event)" alt="pic3">
                <img class="image2 description h-100 opacity-50 hover:opacity-100 cursor-pointer border-double border-4 border-light-blue-500" src="assets/img/1.png" onclick="currentSlide(event)" alt="pic3">   
            </div>
            </div>
            </div>
        </div>
        
        <div class=" flex-1 flex flex-col hidden" id="listview">
            <div class="px-6 h-full opacity-100 flex flex-row flex-wrap -mx-2">
            
                
        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-2">
        <div class="relative bg-white rounded border">
            <picture class="block bg-gray-200 border-b">
            <img class="block" src="assets/img/1.png" alt="Card 1">
            </picture>
            <div class="p-4">
            <h3 class="text-lg font-bold">
                <a class="stretched-link" href="#" title="Card 1">
                Card 1
                </a>
            </h3>
            <time class="block mb-2 text-sm text-gray-600" datetime="2019-01-01">1st January 2019</time>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
        </div>
        </div>
            
        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-2">
        <div class="relative bg-white rounded border">
            <picture class="block bg-gray-200 border-b">
            <img class="block" src="assets/img/1.png" alt="Card 1">
            </picture>
            <div class="p-4">
            <h3 class="text-lg font-bold">
                <a class="stretched-link" href="#" title="Card 1">
                Card 1
                </a>
            </h3>
            <time class="block mb-2 text-sm text-gray-600" datetime="2019-01-01">1st January 2019</time>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
        </div>
        </div>
            
        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-2">
        <div class="relative bg-white rounded border">
            <picture class="block bg-gray-200 border-b">
            <img class="block" src="assets/img/1.png" alt="Card 1">
            </picture>
            <div class="p-4">
            <h3 class="text-lg font-bold">
                <a class="stretched-link" href="#" title="Card 1">
                Card 1
                </a>
            </h3>
            <time class="block mb-2 text-sm text-gray-600" datetime="2019-01-01">1st January 2019</time>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
        </div>
        </div>
        
        <div class="w-full sm:w-1/2 md:w-1/3 mb-4 px-2">
        <div class="relative bg-white rounded border">
            <picture class="block bg-gray-200 border-b">
            <img class="block" src="assets/img/1.png" alt="Card 1">
            </picture>
            <div class="p-4">
            <h3 class="text-lg font-bold">
                <a class="stretched-link" href="#" title="Card 1">
                Card 1
                </a>
            </h3>
            <time class="block mb-2 text-sm text-gray-600" datetime="2019-01-01">1st January 2019</time>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
            </p>
            </div>
        </div>
        </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    <script>
    //JS to switch slides and replace text in bar//
    var slideIndex = 1;

    function plusSlides(n) {
        showSlides(slideIndex += n);
    }

    function currentSlide(n) {
        showSlides(slideIndex = n);
    }

    function showSlides(e) {
        var i;
        const preview=document.getElementById("preview");
        const slides=document.getElementById("slide").children;
        //var slides = document.getElementsByClassName("mySlides");
        //var dots = document.getElementsByClassName("description");
        const captionText = document.getElementById("caption");
        //if (n > slides.length) {
        //  slideIndex = 1
        //}
        //if (n < 1) {
        //  slideIndex = slides.length
        //}
        for (i = 0; i < slides.length; i++) {
        if(slides[i].classList.contains('opacity-100'))
            slides[i].classList.replace('opacity-100','opacity-50')
        }
        preview.src=e.target.src;
        e.target.classList.replace('opacity-50','opacity-100');
        //for (i = 0; i < dots.length; i++) {
        //  dots[i].className = dots[i].className.replace(" opacity-100", "");
        //}
        //slides[slideIndex - 1].style.display = "block";
        //dots[slideIndex - 1].className += " opacity-100";
        captionText.innerHTML = e.target.alt;
    }
        let viewtoggle=document.getElementById('viewtoggle').children
    function toggle(e){
        for (i = 0; i < viewtoggle.length; i++) {
        //if(viewtoggle[i].classList.contains('active'))
        viewtoggle[i].classList.remove('activeS')
        }
        e.classList.add('activeS');
        if(e.children[1].innerHTML=='List'){
        document.getElementById('gridview').classList.add('hidden')
        document.getElementById('listview').classList.remove('hidden')
        }
        else{
        document.getElementById('gridview').classList.remove('hidden')
        document.getElementById('listview').classList.add('hidden')
        }
    }
    </script>
</body>
</html>
