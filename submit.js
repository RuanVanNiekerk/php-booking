/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
document.getElementById("comp").addEventListener("submit", function(event){
    alert("stopped default");
    event.preventDefault();
});
