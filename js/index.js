const registrar = document.querySelector('#registrar')
const nome = document.querySelector('#nome')
const entradaSaida = document.querySelector('#entradaSaida')
const tbody = document.querySelector('#tbody')

registrar.addEventListener('click', () => {
    if (nome.value == "") {
        alert("O campo nome está vazio!!!")
        return
    }

    const data = {
        nome: nome.value,
        entrada_saida: entradaSaida.value
    }

    fetch('php/cadastrar.php', {
        method: "POST",
        body: JSON.stringify(data)
    })
    .then((response) => response.json())
    .then((dado) => {
        const primeiroDado = document.querySelectorAll('tr')[1]
        let tr = document.createElement('tr')
        tr.innerHTML = "<td><img src='img/cliente.jpg' alt='foto usuário'></td>"
        tr.innerHTML += `<td>${dado['nome']}</td>`
        tr.innerHTML += `<td>${dado['entrada_saida']}</td>`
        tr.innerHTML += `<td>${dado['data_hora']}</td>`

        tbody.insertBefore(tr, primeiroDado)
    })
    .catch((err) => console.log(err))

    nome.value = ""
})

const filtroNome = document.querySelector('#filtroNome')

filtroNome.addEventListener('click', () => {
    fetch('php/filtroNome.php')
    .then((response) => response.text())
    .then((dado) => tbody.innerHTML = dado)
    .catch((err) => console.log(err))
})

const filtroData = document.querySelector('#filtroData')

filtroData.addEventListener('click', () => {
    fetch('php/filtroData.php')
    .then((response) => response.text())
    .then((dado) => tbody.innerHTML = dado)
    .catch((err) => console.log(err))
})

const dataEspecifica = document.querySelector('#data')

dataEspecifica.addEventListener('change', () => {
    fetch('php/dataEspecifica.php', {
        method: "POST",
        body: dataEspecifica.value
    })
    .then((response) => response.text())
    .then((dado) => tbody.innerHTML = dado)
    .catch((err) => console.log(err))
})

const nomePesquisa = document.querySelector('#nomePesquisa')

nomePesquisa.addEventListener('keypress', (event) => {
    if (event.key == "Enter"){
        fetch('php/nomePesquisa.php', {
            method: "POST",
            body: nomePesquisa.value
        })
        .then((response) => response.text())
        .then((dado) => tbody.innerHTML = dado)
        .catch((err) => console.log(err))
    }
})