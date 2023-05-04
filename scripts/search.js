document.addEventListener("keyup", e=>{

    if(e.key === "Escape")e.target.value=""

    if(e.target.matches("#search")){
        document.querySelectorAll(".termino").forEach(palabra =>{
            palabra.textContent.toLowerCase().includes(e.target.value.toLowerCase())
                ?palabra.classList.remove("filtro")
                :palabra.classList.add("filtro")
        })      
    }
})