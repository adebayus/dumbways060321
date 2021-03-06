function showAddListButton(){
    const menu_tambah = document.getElementById("menu_tambah");
    if (menu_tambah.classList.contains("hidden")) {
        menu_tambah.classList.remove("hidden")
    }else {
        menu_tambah.classList.add("hidden")
    } 
}

function addFormHandle(name_form){
    const tambah_form = document.getElementById(name_form)
    const body = document.getElementById("body")
    console.log(tambah_form)
    if (tambah_form.classList.contains("hidden")) {
        body.classList.add("overflow-y-hidden");
        tambah_form.classList.remove("hidden");
    }else{
        document.getElementById("body").classList.remove("overflow-y-hidden")
        tambah_form.classList.add("hidden");
    }
}

function closeModalForm(name_form){
    const tambah_form = document.getElementById(name_form)
    const body = document.getElementById("body")
    console.log(tambah_form)
    if (tambah_form.classList.contains("hidden")) {
        body.classList.add("overflow-y-hidden");
        tambah_form.classList.remove("hidden");
    }else{
        body.classList.remove("overflow-y-hidden");
        tambah_form.classList.add("hidden");
    }   
}
