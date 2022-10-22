let statusMenu = false;

 function toggleMenu() { 
    
    let menu = document.querySelector('.sidebar');
    if (statusMenu === false){
        menu.style.cssText = "display: block; visibility: visible; opacity: 1; height: 40px !important;";
        statusMenu = true;
    }else if(statusMenu === true){
        menu.style.cssText = "display: block; visibility: visible; opacity: 1; width: 200px;";
        statusMenu = false;
    }
    
    console.log(statusMenu);
}
