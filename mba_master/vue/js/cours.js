let boutonfile=document.querySelectorAll(".boutton_file");
let inputfile=document.querySelectorAll(".file_book");
let filename=document.querySelectorAll(".file_name");
for (let index = 0; index < boutonfile.length; index++) {
    boutonfile[index].addEventListener("click",function(event){
       inputfile[index].click();     
    },true)
    inputfile[index].addEventListener("change",function(event){
        filename[index].textContent=inputfile[index].value;
    },false)
    
}




