
function myfunction()
{
   var x= document.getElementById('quantity').value;
   console.log(x);
   if( x>=1&&x<=10){
    window.location.href='order.php';
 }else{
 alert('please fill a Number of fill a number within range');
 window.location.href='shoppingcart.php';
 }
}




