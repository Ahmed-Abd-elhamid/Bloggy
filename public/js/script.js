// console.log("hgfd");
var msg = '{{Session::get('alert')}}';
var exist = '{{Session::has('alert')}}';
if(exist){
  alert(msg);
}
