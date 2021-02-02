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