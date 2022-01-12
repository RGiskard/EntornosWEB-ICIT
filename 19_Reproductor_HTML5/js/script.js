console.log("Welcome al reproductr icit !")

//Inicializacion de variables 
let songIndex = 0;
let masterPlay = document.getElementById('masterPlay');
let myProgressBar = document.getElementById('myProgressBar')
let masterSongName = document.getElementById('masterSongName')
let gif = document.getElementById('gif')
let audioElement = new Audio('songs/1.mp3');
let songItems = Array.from(document.getElementsByClassName('songItem'));
let songs = [
        { songName: "1nOnly shakira ft Egovert", filePath: "songs/1.mp3", coverPath: "covers/cover1.jpg" },
        { songName: "Bella Ciao Money Heist", filePath: "songs/2.mp3", coverPath: "covers/cover2.jpg" },
        { songName: "David Guetta Hey Mama", filePath: "songs/3.mp3", coverPath: "covers/cover3.jpg" },
        { songName: "Gasolina - Daddy Yankee", filePath: "songs/4.mp3", coverPath: "covers/cover.jpg" },
        { songName: "Industry Baby LiL Nas", filePath: "songs/5.mp3", coverPath: "covers/cover5.jpg" },
        { songName: "Lonely - Akon 8D Audio", filePath: "songs/6.mp3", coverPath: "covers/cover6.jpg" },
        { songName: "Love Nwantiti 8D Audio", filePath: "songs/7.mp3", coverPath: "covers/cover7.jpg" },
        { songName: "Astronaut In The Ocean", filePath: "songs/8.mp3", coverPath: "covers/cover8.jpg" }
    ]
    // audioElement.play();

songItems.forEach((element, i) => {
    element.getElementsByTagName("img")[0].src = songs[i].coverPath;
    element.getElementsByClassName("songName")[0].innerHTML = songs[i].songName;
})

//Manipulacion play/Pause 
masterPlay.addEventListener('click', () => {
        if (audioElement.paused || audioElement.currentTime <= 0) {
            audioElement.play();
            masterPlay.classList.remove('fa-play-circle')
            masterPlay.classList.add('fa-pause-circle')
            gif.style.opacity = 1;
        } else {
            audioElement.pause();
            masterPlay.classList.remove('fa-pause-circle')
            masterPlay.classList.add('fa-play-circle')
            gif.style.opacity = 0;
        }
    })
    //Listen to the events
audioElement.addEventListener('timeupdate', () => {
    //Actualizar la barra de búsqueda
    let progress = parseInt((audioElement.currentTime / audioElement.duration) * 100);
    myProgressBar.value = progress;
})

myProgressBar.addEventListener('change', () => {
    audioElement.currentTime = (myProgressBar.value * audioElement.duration) / 100;
})

const makeAllPlays = () => {
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element) => {
        element.classList.remove('fa-pause-circle');
        element.classList.add('fa-play-circle')
    })
}

Array.from(document.getElementsByClassName('songItemPlay')).forEach((element) => {
    element.addEventListener('click', (e) => {
        makeAllPlays();
        songIndex = parseInt(e.target.id);
        e.target.classList.remove('fa-play-circle');
        e.target.classList.add('fa-pause-circle');
        audioElement.src = `songs/${songIndex+1}.mp3`;
        audioElement.currentTime = 0;
        masterSongName.innerHTML = songs[songIndex].songName;
        audioElement.play();
        masterPlay.classList.remove('fa-play-circle')
        masterPlay.classList.add('fa-pause-circle')
        gif.style.opacity = 1;
    })
})

document.getElementById('next').addEventListener('click', () => {
    if (songIndex > 7) {
        songIndex = 0;
        gif.style.opacity = 1;
    } else {
        songIndex += 1;
    }
    masterSongName.innerHTML = songs[songIndex].songName;
    audioElement.src = `songs/${songIndex+1}.mp3`;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle')
    masterPlay.classList.add('fa-pause-circle')
    gif.style.opacity = 1;
})

document.getElementById('previous').addEventListener('click', () => {
    if (songIndex <= 0) {
        songIndex = 0;
        gif.style.opacity = 1;
    } else {
        songIndex -= 1;
    }
    masterSongName.innerHTML = songs[songIndex].songName;
    audioElement.src = `songs/${songIndex+1}.mp3`;
    audioElement.currentTime = 0;
    audioElement.play();
    masterPlay.classList.remove('fa-play-circle')
    masterPlay.classList.add('fa-pause-circle')
    gif.style.opacity = 1;
})