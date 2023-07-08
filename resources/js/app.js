import './bootstrap';
Echo.private('notifications')
.listen('UserSessionChanged',(e)=>{
   const notificayinelement=document.getElementById("notifications");
   notificayinelement.innerText=e.message;
   notificayinelement.classList.remove('invisible');
   notificayinelement.classList.remove('alert-success');
   notificayinelement.classList.remove('alert-danger');
   notificayinelement.classList.add('alert-'+e.type);
});
