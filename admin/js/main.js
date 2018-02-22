var welcomeMessage = document.querySelector('.welcome_message');
var welcomeImage = document.querySelector('#welcome_message_div');
var closeButton = document.querySelector('#x');


//Found this instead of using date("Y-m-d h:i:sa"), made it eaiser as a whole value to determine time range

var today = new Date();
var currentHour = today.getHours();


if (currentHour < 12) {
  //console.log('good morning')
  welcomeMessage.innerHTML = "Welcome! I dont know how you can be a morning person, but thanks!";
  welcomeImage.style.backgroundImage = "url('../images/morning.jpg')";

} else if (currentHour < 18) {
  //console.log('good evening')
  welcomeMessage.innerHTML = "Welcome! Hope you had a great afternoon!";
  welcomeImage.style.backgroundImage = "url('../images/evening.jpg')";

} else {
  //console.log('good evening')
  welcomeMessage.innerHTML = "Welcome! Working like a night owl!";
  welcomeImage.style.backgroundImage = "url('../images/night.jpg')";

}


function closeX (){
  //console.log('button clicked');
  welcomeImage.style.display = "none";
}



closeButton .addEventListener("click", closeX, false);
