function InputFile(inputfile,bottonfile,filename){
    /*let bottonfile=document.querySelectorAll(".boutton_file");
    let inputfile=document.querySelectorAll(".file_book");
    let filename=document.querySelectorAll(".file_name");
    */
   this.inputfile=inputfile;
   this.bottonfile=bottonfile;
   this.filename=filename;

   this.attachToBottonInputFile= (botton,input,filename) => {
    for (let index = 0; index < botton.length; index++) {
        //select every botton file and click every input file on it was clicked
        botton[index].addEventListener("click",function(){
        input[index].click();     
        },true)
        //change the file name on th value of the input was changed
        input[index].addEventListener("change",function(_event){
            filename[index].textContent=input[index].value;
        },false)
    }
   }
   
}


let bottonfile=document.querySelectorAll(".boutton_file");
let inputfile=document.querySelectorAll(".file_book");
let filename=document.querySelectorAll(".file_name");
let file= new InputFile(inputfile,bottonfile,filename);
file.attachToBottonInputFile(bottonfile,inputfile,filename);

//displaying hover for aside navigation
let listitem=document.querySelectorAll(".navigation-list-item");
for (let iterate = 0; iterate < listitem.length; iterate++) {
    listitem[iterate].addEventListener("mouseover",function (event) { 
        if(listitem[iterate].querySelectorAll(".navigationdropdown")[0]!=undefined){
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.display="block";
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.opacity=1;
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.transition="all 1s 0s ease"
        }
        
     },true);

     listitem[iterate].addEventListener("mouseout",function (event) { 
        if(listitem[iterate].querySelectorAll(".navigationdropdown")[0]!=undefined){
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.display="none";
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.opacity=0;
            listitem[iterate].querySelectorAll(".navigationdropdown")[0].style.transition="all 1s 0s ease"
        }
        
     },true);
    
}

//dsiplaying different format sendig when choosing the format

let selectformat=document.querySelector("#formatchoosing");
let inputvideomg=document.createElement("div");
let containerinputforsenditformat=document.querySelectorAll(".containerinputforsenditformat")[0];

inputvideomg.classList="form-group d-flex flex-column";
inputvideomg.innerHTML='<label>Ajouter une lien vers une video youtube en malgache</label><input name="lienVideoMg" type="text" placeholder="lien vers une video youtube"/>';
let inputvideofr=document.createElement("div");
inputvideofr.classList="form-group d-flex flex-column";
inputvideofr.innerHTML='<label>Ajouter une lien vers une video youtube en français</label><input name="lienVideoFr" type="text" placeholder="lien vers une video youtube en français"/>';
let inputlivremg=document.createElement("div");
inputlivremg.classList="form-group";
inputlivremg.innerHTML='<div class="container_field_import"><label for="file_book_mg">contenu pour les nationaux<div class="boutton_file">choisir</div><input id="file_book_mg" class="file_book" type="file" /><span class="file_name">Aucune fichier selectionné</span></div>';

let inputlivrefr=document.createElement("div");
inputlivrefr.classList='form-group';
inputlivrefr.innerHTML='<div class="container_field_import"><label for="file_book_et">contenu pour les etrangers</label><div class="boutton_file">choisir</div><input id="file_book_et" class="file_book" type="file" /><span class="file_name">Aucune fichier selectionné</span></div>'

let inputaudiomg=document.createElement('div');
inputaudiomg.classList="form-group";
inputaudiomg.innerHTML='<div class="container_field_import"><label for="file_book_mg">contenu pour les nationaux<div class="boutton_file">choisir</div><input id="file_book_mg" class="file_book" name="contenu_mg[]" type="file" accept="audio/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple /><span class="file_name">Aucune fichier selectionné</span></div>';
let inputaudiofr=document.createElement("div");
inputaudiofr.classList='form-group';
inputaudiofr.innerHTML='<div class="container_field_import"><label for="file_book_et">contenu pour les etrangers</label><div class="boutton_file">choisir</div><input id="file_book_mg" class="file_book" name="contenu_fr[]" type="file" accept="audio/* , application/vnd.openxmlformats-officedocument.wordprocessingml.document , application/msword , application/pdf" multiple /><span class="file_name">Aucune fichier selectionné</span></div>'

selectformat.addEventListener("change",function (event) {
    if(event.target.value==2){
        $(".containerinputforsenditformat").empty();
        containerinputforsenditformat.appendChild(inputvideomg);
        containerinputforsenditformat.appendChild(inputvideofr);
    }else if(event.target.value==1){
        $(".containerinputforsenditformat").empty();
        containerinputforsenditformat.appendChild(inputlivremg);
        containerinputforsenditformat.appendChild(inputlivrefr);
    }else if(event.target.value==3){
        $(".containerinputforsenditformat").empty();
        containerinputforsenditformat.appendChild(inputaudiomg);
        containerinputforsenditformat.appendChild(inputaudiofr);
    }
    
},true)
