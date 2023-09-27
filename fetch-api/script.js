const btnload = document.getElementById('load');
const articleList = document.getElementById('articleList');
btnload.onclick = function() {
    fetch('https://jsonplaceholder.typicode.com/users')
    .then(
        function(result){
            return result.json()
        }
    )
    .then(
        function(j){
            console.log(j)
            for(i = 0; i<j.length; i++){
                var el = document.createElement("li")
                el.innerHTML = j[i].name + " - " + j[i].email
                articleList.appendChild(el)
            }
        }
    )
}