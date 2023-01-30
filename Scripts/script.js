
const search_input = document.querySelector("#search_input");

const search_form = document.querySelector("#search_form");

const suggestions = document.querySelector("#suggestions");

       
document.addEventListener("keyup", function(){

    if(suggestions.children.length > 0) suggestions.innerHTML = "";

    const search_request = new FormData(search_form);

    fetch('../Controller/database_search.php?search=' + search_input.value, {
        method : "GET"
    })

        .then(response => response.json())

        .then((data) => {
        
            for(let x in data) {

                let contain_name = document.createElement("a");

                contain_name.setAttribute("href", `search.php?full_name=${data[x].full_name}`);

                contain_name.innerHTML = data[x].full_name;

                suggestions.appendChild(contain_name);
            }
            
        });                  
});