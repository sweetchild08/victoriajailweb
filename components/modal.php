
<?php
function verification($length)
{
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    return substr(str_shuffle($str_result),
    0, $length);
}
?>
<!-- component -->
<style>
  dialog[open] {
  animation: appear .15s cubic-bezier(0, 1.8, 1, 1.8);
}

  dialog::backdrop {
    background: linear-gradient(45deg, rgba(0, 0, 0, 0.5), rgba(54, 54, 54, 0.5));
    backdrop-filter: blur(3px);
  }
  
 
@keyframes appear {
  from {
    opacity: 0;
    transform: translateX(-3rem);
  }

  to {
    opacity: 1;
    transform: translateX(0);
  }
} 
</style>

<!-- <section class=" flex h-screen w-screen p-10 justify-center items-start">
  <button onclick="document.getElementById('myModal').showModal()" id="btn" class="py-3 px-10 bg-gray-800 text-white rounded text shadow-xl">Open</button>
</section> -->

<dialog id="myModal" class="w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
        <form action="controller/<?=$page['name']?>.php" method="post" enctype="multipart/form-data">
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
          <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Post <?php echo $page['title'] ?>
          </div>
          <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>
          <!--Header End-->
        </div>
          <!-- Modal Content-->
           <div class="flex w-full p-4 h-auto justify-center items-center bg-gray-200 rounded text-center text-gray-500">
            <div class="form w-full">
                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                    <div class="w-full flex flex-col mb-3">
                    
                    <label class="w-full font-semibold text-gray-600 py-2">Proof/Pictures</label>
                            <div class="bg-white p7 rounded w-9/12 mx-auto">
                                <div x-data="dataFileDnD()" class="relative flex flex-col p-4 text-gray-400 border border-gray-200 rounded">
                                    <div x-ref="dnd" class="relative flex flex-col text-gray-400 border border-gray-200 border-dashed rounded cursor-pointer">
                                        <input accept="*" type="file" name="files" multiple class="absolute inset-0 z-50 w-full h-full p-0 m-0 outline-none opacity-0 cursor-pointer" @change="addFiles($event)" @dragover="$refs.dnd.classList.add('border-blue-400'); $refs.dnd.classList.add('ring-4'); $refs.dnd.classList.add('ring-inset');"
                                        @dragleave="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');" @drop="$refs.dnd.classList.remove('border-blue-400'); $refs.dnd.classList.remove('ring-4'); $refs.dnd.classList.remove('ring-inset');"
                                        title="" />

                                        <div class="flex flex-col items-center justify-center py-10 text-center">
                                            <svg class="w-6 h-6 mr-1 text-current-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <p class="m-0">Drag your files here or click in this area.</p>
                                        </div>
                                    </div>

                                    <template x-if="files.length > 0">
                                        <div class="grid grid-cols-2 gap-4 mt-4 md:grid-cols-6" @drop.prevent="drop($event)" @dragover.prevent="$event.dataTransfer.dropEffect = 'move'">
                                            <template x-for="(_, index) in Array.from({ length: files.length })">
                                                <div class="relative flex flex-col items-center overflow-hidden text-center bg-gray-100 border rounded cursor-move select-none" style="padding-top: 100%;" @dragstart="dragstart($event)" @dragend="fileDragging = null" :class="{'border-blue-600': fileDragging == index}"
                                                draggable="true" :data-index="index">
                                                    <button class="absolute top-0 right-0 z-50 p-1 bg-white rounded-bl focus:outline-none" type="button" @click="remove(index)">
                                                        <svg class="w-4 h-4 text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                        </svg>
                                                    </button>
                                                    <template x-if="files[index].type.includes('audio/')">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3" />
                                                        </svg>
                                                    </template>
                                                    <template x-if="files[index].type.includes('application/') || files[index].type === ''">
                                                        <svg class="absolute w-12 h-12 text-gray-400 transform top-1/2 -translate-y-2/3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                        </svg>
                                                    </template>
                                                    <template x-if="files[index].type.includes('image/')">
                                                        <img class="absolute inset-0 z-0 object-cover w-full h-full border-4 border-white preview" x-bind:src="loadFile(files[index])" />
                                                    </template>
                                                    <template x-if="files[index].type.includes('video/')">
                                                        <video class="absolute inset-0 object-cover w-full h-full border-4 border-white pointer-events-none preview">
                                                            <fileDragging x-bind:src="loadFile(files[index])" type="video/mp4">
                                                        </video>
                                                    </template>

                                                    <div class="absolute bottom-0 left-0 right-0 flex flex-col p-2 text-xs bg-white bg-opacity-50">
                                                        <span class="w-full font-bold text-gray-900 truncate" x-text="files[index].name">Loading</span>
                                                        <span class="text-xs text-gray-900" x-text="humanFileSize(files[index].size)">...</span>
                                                    </div>

                                                    <div class="absolute inset-0 z-40 transition-colors duration-300" @dragenter="dragenter($event)" @dragleave="fileDropping = null" :class="{'bg-blue-200 bg-opacity-80': fileDropping == index && fileDragging != index}">
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </template>
                                </div>
                            </div>
                    </div>
                </div>
                <?php if($page['title'] == 'Lost') { ?>
                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                    <label class="font-semibold text-gray-600 py-2">Affidavit of Lost </label>
                   <br> <label class="font-semibold text-gray-600 py-2">NOTE: For Missing Person, upload person's identity  </label></br>
                    <input type="file" required="" name="affidavit" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" />
                
                </div> 
                <?php  } ?>
                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Name</label>
                        <input placeholder="Full Name (Optional)" class=" alpha appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="name" id="name">
                        <small></small>
                    </div>
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Contact Number</label>
                        <input placeholder="Contact Number" class="number appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="contact" id="contact">
                        <small></small>
                    </div>
                </div>
                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Email Address</label>
                        <input placeholder="ex email@example.com" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="email" id="email">
                    </div>
                </div>
                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Subject </label>
                        <input placeholder="Subject of Report" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="subject" id="subject">
                    </div>
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Location </label>
                        <input placeholder="Location of Report" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="location" id="location">
                    </div>
                </div>
                <div class="flex-auto w-full mb-1 text-xs space-y-2">
                    <label class="font-semibold text-gray-600 py-2">Notes</label>
                    <textarea required="" name="notes" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Description" spellcheck="false"></textarea>
                
                </div> 
                <div class="md:flex md:flex-row md:space-x-4 w-full text-xs ">
                    <div class="w-full flex flex-col mb-3">
                        <label class="font-semibold text-gray-600 py-2">Captcha </label>
                        <div class="md:flex md:flex-row md:space-x-4 w-full text-xs justify-center">
                        
                <input placeholder="Type whats on the right" class="appearance-none block w-1/2 bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="captcha" id="captcha">
                        
                        </div>
                    </div>
                </div>
                <center>
                            <?php
                            $validation = verification(10);
                            // echo $validation;
                            $_SESSION['captcha']=$validation;
                            $img = imagecreate(100, 20);
                            $textbgcolor = imagecolorallocate($img, 173, 230, 181);
                            $textcolor = imagecolorallocate($img, 0, 192, 255);
                            imagestring($img, 5, 5, 5, $validation, $textcolor);
                            ob_start();
                            imagepng($img);
                            printf('<img class="w-1/3" src="data:image/png;base64,%s"/ >', base64_encode(ob_get_clean()));
                                ?>
                </center>
            </div>
          </div>
            <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                    asterisk <abbr title="Required field">*</abbr></p>
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                    <button type="submit" name="postlost" id="report" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Report</button>
                </div>
          <!-- End of Modal Content-->
          
        </div>
        </form>
</dialog>