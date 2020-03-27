// console.log("hgfd");
// var msg = '{{Session::get('alert')}}';
// var exist = '{{Session::has('alert')}}';
//
// if(exist){
//   alert(msg);
// }

var delBtn = document.querySelectorAll(".del");

for (let value of delBtn) {
  // console.log(value);
  value.addEventListener("click", myFunction);
}

function myFunction() {
  var ans = confirm("Do you want to Delete it?");
  if(ans){
    document.getElementById("delet").submit();
}}
