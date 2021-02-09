function InputFile(inputfile, bottonfile, filename) {
    /*let bottonfile=document.querySelectorAll(".boutton_file");
    let inputfile=document.querySelectorAll(".file_book");
    let filename=document.querySelectorAll(".file_name");
    */
    this.inputfile = inputfile;
    this.bottonfile = bottonfile;
    this.filename = filename;

    this.attachToBottonInputFile = (botton, input, filename) => {
        for (let index = 0; index < botton.length; index++) {
            //select every botton file and click every input file on it was clicked
            botton[index].addEventListener("click", function () {
                input[index].click();
            }, true)
            //change the file name on th value of the input was changed
            input[index].addEventListener("change", function (_event) {
                filename[index].textContent = input[index].value;
            }, false)
        }
    }

}


let bottonfile = document.querySelectorAll(".boutton_file");
let inputfile = document.querySelectorAll(".file_book");
let filename = document.querySelectorAll(".file_name");
let file = new InputFile(inputfile, bottonfile, filename);
file.attachToBottonInputFile(bottonfile, inputfile, filename);

//displaying hover for aside navigation
let listitem = document.querySelectorAll(".navigation-list-item");
for (let iterate = 0; iterate < listitem.length; iterate++) {

    if (listitem[iterate].querySelectorAll(".navigationdropdown1")[0] != undefined) {
        let nav = listitem[iterate].querySelectorAll(".navigationdropdown1")[0];
        listitem[iterate].addEventListener("mouseover", function (event) {

            if (nav != undefined) {
                nav.style.display = "block";
                nav.style.opacity = 1;
                nav.style.transition = "all 1s 0s ease";
                if (nav.querySelectorAll(".navigationdropdown2")[0] != undefined) {
                    let nav2 = nav.querySelectorAll(".navigationdropdown2")[0];
                    let listdropdown1 = listitem[iterate].querySelectorAll(".linavigationdropdown1")[0];
                    listdropdown1.addEventListener("mouseover", function (event) {
                        nav2.style.display = "block";
                        nav2.style.opacity = 1;
                        nav2.style.transition = "all 1s 0s ease";
                    }, true)
                    listdropdown1.addEventListener("mouseout", function (event) {
                        nav2.style.display = "none";
                        nav2.style.opacity = 0;
                        nav2.style.transition = "all 1s 0s ease";
                    }, true)
                }

            }

        }, true);

        listitem[iterate].addEventListener("mouseout", function (event) {
            if (nav != undefined) {
                nav.style.display = "none";
                nav.style.opacity = 0;
                nav.style.transition = "all 1s 0s ease"
            }

        }, true);
    }

}



        $(".containerinputforsenditformat").empty();
        containerinputforsenditformat.appendChild(inputvideomg);
        containerinputforsenditformat.appendChild(inputvideofr);
    } else if (event.target.value == 1 || event.target.value == 3) {
        $(".containerinputforsenditformat").empty();
        containerinputforsenditformat.appendChild(inputlivremg);
        containerinputforsenditformat.appendChild(inputlivrefr);
    }



}, true)