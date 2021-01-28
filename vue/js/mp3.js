function play(idplayer, controlplay)  {
    let player = document.querySelector('#' + idplayer);
    //let playerlist = document.querySelector('.listplay');

    if (player.paused) {
        player.play();
        controlplay.innerHTML = '<i class="fa fa-pause"></i>';
       // playerlist.innerHTML = '<i class="fa fa-pause"></i>';
    } else {
        player.pause();
        controlplay.innerHTML = '<i class="fa fa-play"></i>';
       // playerlist.innerHTML = '<i class="fa fa-play"></i>';
    }
}

//stop
/*function resume (idplayer) {
    let player = document.querySelector('#' + idplayer);

    player.currentTime = 0;
    player.pause();
}*/

//volume
function mute(idplayer, mute) {
    let player = document.querySelector("#" + idplayer);
    if (player.muted == false) {
        player.muted = true;
        mute.innerHTML = '<i class="fas fa-volume-mute"></i>'
    } else {
        player.muted = false;
        mute.innerHTML = '<i class="fa fa-volume-up"></i>'
    }
}

function moins(idplayer) {
    let player = document.querySelector("#" + idplayer);

    if (player.volume == 1) {
        player.volume = 0.8;
    } else if (player.volume == 0.8) {
        player.volume = 0.6;
    } else if (player.volume == 0.6) {
        player.volume = 0.4;
    } else if (player.volume == 0.4) {
        player.volume = 0.2;
    } else {
        player.volume = 0;
    }
}

function plus(idplayer) {
    let player = document.querySelector("#" + idplayer);

    if (player.volume == 0) {
        player.volume = 0.2;
    } else if (player.volume == 0.2) {
        player.volume = 0.4;
    } else if (player.volume == 0.4) {
        player.volume = 0.6;
    } else if (player.volume == 0.6) {
        player.volume = 0.8;
    } else {
        player.volume = 1;
    }
}

//next et preview
function preview(idplayer) {
    let player = document.querySelector("#" + idplayer);

    let temps20 = player.seekable.end(0) / 40;
    let curtime = player.currentTime;

    if (player.currentTime) {
        player.currentTime = (curtime - temps20);
    }

}

function next(idplayer) {
    let player = document.querySelector("#" + idplayer);

    let temps20 = player.seekable.end(0) / 40;
    let curtime = player.currentTime;

    if (player.currentTime) {
        player.currentTime = (curtime + temps20);
    }
}


//bar de progression
function update(player) {
    let duration = player.duration;
    let time = player.currentTime;
    let fraction = time / duration;
    let percent = Math.ceil(fraction * 100);

    let progress = document.querySelector('#progressBar');

    progress.style.background = 'red';
    progress.style.width = '100%';
    //progress.textContent = percent + '%';

    document.querySelector('#progressTime').textContent = formatTime(time);
}

//affichage temps
function formatTime(time) {
    let hours = Math.floor(time / 3600);
    let mins = Math.floor((time % 3500) / 60);
    let secs = Math.floor(time % 60);

    if (secs < 10) {
        secs = "0" + secs;
    }

    if (hours) {
        if (mins < 10) {
            mins = "0" + mins;
        }

        return hours + ":" + mins + ":" + secs; //hh:min:ss
    } else {
        return mins + ":" + secs;
    }

}
