let frutas = ["Manzana", "Banana"]
let primero = frutas[0]
let ultimo = frutas[frutas.length - 1]


frutas.forEach(function(elemento, indice, array) {
  console.log(elemento, indice);
})

let nuevaLongitud = frutas.push('Naranja') // Añade "Naranja" al final

frutas.forEach(function(elemento, indice, array) {
  console.log(elemento, indice);
})