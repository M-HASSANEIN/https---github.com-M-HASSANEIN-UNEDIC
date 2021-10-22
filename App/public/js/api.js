


document.addEventListener('DOMContentLoaded', function () {

    let table = document.getElementById("list");
    /* console.log(table) */


    fetch('http://localhost:3000/App/public/index.php/apip/students.json')
        .then(response => response.json())
        .then(data => {
            /*   console.log(data) */
            for (let i = 0; i < data.length; i++) {

                table.innerHTML += `<tr>
                <th scope="row">${data[i].id}</th>
                <td>${data[i].FirstName}</td>
                <td>${data[i].LastName}</td>
                <td>${data[i].NumEtud}</td>
                <td>${data[i].department.Name}</td>
                <td>${data[i].department.Capacity}</td>
            </tr>`;





            }
        }







        );





























    /*   const data = () => {
          fetch("http://localhost:3000/App/public/index.php/apip/students")
              .then((data) => data.json())
              .then((data) => console.log(data))
      }
  
      data() */
});
