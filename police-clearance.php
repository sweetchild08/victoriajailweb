<?php
$page=[
    'title'=>'Report Incident',
    'name'=>'report'
    ];
include 'helper/includes.php';
?>
<!doctype html>
<html lang="en">

    <?php include 'components/headtag.php'; ?>
    
<body class="h-screen flex flex-col flex-1 overflow-auto" style="background: #edf2f7;">
    <?php include 'components/header.php' ?>
    <div class="flex flex-1 h-4/5">
        <?php include 'components/sidebar.php' ?>
        <div class="m-6 w-full h-full">
        <div class="grid mt-8  gap-8 md:grid-cols-5 xs:grid-col-1 xs:mx-10">
    <div class="flex flex-col md:col-start-2 md:col-span-3">
        <div class="bg-white shadow-md rounded-3xl p-5  max-h-full overflow-auto">
            <div class="flex flex-col sm:flex-row items-center">
                <h2 class="font-semibold text-lg mr-auto">Police Clearance Form</h2>
                <div class="w-full sm:w-auto sm:ml-auto mt-3 sm:mt-0"></div>
            </div>
            <div class="mt-5">
                <form action="controller/clearance.php" method="post" enctype="multipart/form-data">
                    <div class="form">
                            <h3>Requirements:</h3><hr>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Res. cert. (cedula)</label>
                                    <input accept=".jpg,.jpeg,.png,.bmp,.gif,.jfif" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="file" name="cedula" id="cedula">
                                    <small style="color:red"></small>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Barangay Clearance</label>
                                    <input accept=".jpg,.jpeg,.png,.bmp,.gif,.jfif" placeholder="Pangalan" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="file" name="barangay_clearance" id="barangay_clearance">
                                    <small style="color:red"></small>
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Judge Clearance</label>
                                    <input accept=".jpg,.jpeg,.png,.bmp,.gif,.jfif" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="file" name="judge_clearance" id="judge_clearance">
                                    <small style="color:red"></small>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">OR from treasurers office for Police Clearance</label>
                                    <input accept=".jpg,.jpeg,.png,.bmp,.gif,.jfif" placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="file" name="ORno" id="ORno">
                                    <small style="color:red"></small>
                                </div>
                            </div>
                            <hr>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">SurName</label>
                                    <input placeholder="Apelyido" class="alpha appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="last_name" id="last_name">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">First Name</label>
                                    <input placeholder="Pangalan" class="alpha appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="first_name" id="first_name">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Middle Name</label>
                                    <input placeholder="" class="alpha appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="middle_name" id="middle_name">
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Name Extension </label>
                                    <input placeholder="ex. Jr., Sr., II" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="namext" id="namext">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Alias </label>
                                    <input placeholder="Palayaw" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="alias" id="alias">
                                </div>
                            </div>
                            <hr>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Barangay </label>
                                    <select placeholder=" " class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" name="barangay" id="barangay">
                                    </select>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Sitio </label>
                                    <select placeholder=" " class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" name="sitio" id="sitio">
                                    </select>
                                </div>
                            </div>
                            <span class="p-2">Victoria, Oriental Mindoro</span>
                            <hr>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Date of Birth </label>
                                    <input placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="date" name="date_of_birth" id="date_of_birth">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Sex </label>
                                    <select placeholder="Kasarian " class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" name="sex" id="sex">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Civil Status </label>
                                    
                                    <select placeholder="" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" name="civil_status" id="civil_status">
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                        <option value="Widowed">Widowed</option>
                                    </select>
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Place of Birth </label>
                                    <input placeholder="ex. Malabo, Victoria, Oriental Mindoro" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="place_of_birth" id="place_of_birth">
                                </div>
                            </div>
                            <hr>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Citizenship </label>
                                    <input placeholder="ex. Filipino" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="citizenship" id="citizenship">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Religion </label>
                                    <input placeholder="ex. Catholic" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="religion" id="religion">
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Occupation </label>
                                    <input placeholder="ex fisherman" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="occupation" id="occupation">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Contact Number </label>
                                    <input placeholder="ex 0912...." class="number appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="contact_number" id="contact_number">
                                    <small></small>
                                </div>
                            </div>
                            
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Email </label>
                                    <input placeholder="ex sad@gmail.com" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="text" name="email" id="email">
                                </div>
                            </div>
                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Height </label>
                                    <input placeholder="Height in meters" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="number" name="height" id="height">
                                </div>
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Weight </label>
                                    <input placeholder="Weight in kg" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4" type="number" name="weight" id="weight">
                                </div>
                            </div>
                            <div class="flex-auto w-full mb-1 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Purpose</label>
                                <textarea placeholder="ex. Work" name="purpose" id="" class="w-full min-h-[100px] max-h-[300px] h-28 appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4" placeholder="Purpose" spellcheck="false"></textarea>
                            
                            </div>
                            <div class="mt-5 text-right md:space-x-3 md:block flex flex-col-reverse">
                                <button type="submit" name="clearance" id="clearance" class="mb-2 md:mb-0 bg-green-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-green-500">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
			</div>
        </div>
    </div>
<?php include 'components/script.php'?>
<script>
    let barangays=[];
    async function getbarangay() {
      let response = await fetch('purok.json');
      let result = await response.json();
      barangays=result;
      result.map((brgy)=>{
          document.getElementById('barangay').innerHTML+=`<option value="${brgy.barangay}">${brgy.barangay}</option>`;
      })
      document.getElementById('barangay').onchange=(e)=>{
        let sitio = barangays.filter((brgy)=>brgy.barangay==e.target.value);
        document.getElementById('sitio').innerHTML="";
        sitio[0].sitio.map((s)=>{
            document.getElementById('sitio').innerHTML+=`<option value="${s}">${s}</option>`;
        })
      }
    }
    getbarangay();
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="https://unpkg.com/create-file-list"></script>

<script>
    let report=document.getElementById('report');
    report.onclick=(event)=>{
        console.log(this.files);
    }
function dataFileDnD() {
    return {
        files: [],
        fileDragging: null,
        fileDropping: null,
        humanFileSize(size) {
            const i = Math.floor(Math.log(size) / Math.log(1024));
            return (
                (size / Math.pow(1024, i)).toFixed(2) * 1 +
                " " +
                ["B", "kB", "MB", "GB", "TB"][i]
            );
        },
        remove(index) {
            let files = [...this.files];
            files.splice(index, 1);

            this.files = createFileList(files);
        },
        drop(e) {
            let removed, add;
            let files = [...this.files];

            removed = files.splice(this.fileDragging, 1);
            files.splice(this.fileDropping, 0, ...removed);

            this.files = createFileList(files);

            this.fileDropping = null;
            this.fileDragging = null;
        },
        dragenter(e) {
            let targetElem = e.target.closest("[draggable]");

            this.fileDropping = targetElem.getAttribute("data-index");
        },
        dragstart(e) {
            this.fileDragging = e.target
                .closest("[draggable]")
                .getAttribute("data-index");
            e.dataTransfer.effectAllowed = "move";
        },
        loadFile(file) {
            const preview = document.querySelectorAll(".preview");
            const blobUrl = URL.createObjectURL(file);

            preview.forEach(elem => {
                elem.onload = () => {
                    URL.revokeObjectURL(elem.src); // free memory
                };
            });

            return blobUrl;
        },
        addFiles(e) {
            const files = createFileList([...this.files], [...e.target.files]);
            this.files = files;
            console.log(this.form);
            document.querySelector('input[name="files"]').files=files
            formData.files = [...files];
            
        }
    };
}

    var form = document.querySelector('form');
      let formData = new FormData(form);
async function submit(e) {
    e.preventDefault
        console.log()
      let response = await fetch('/article/formdata/post/image-form', {
        method: 'POST',
        body: formData
      });
      let result = await response.json();
      alert(result.message);
    }
</script>

</body>
</html>
