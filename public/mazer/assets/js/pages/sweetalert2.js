
document.getElementById('success').addEventListener('click', (e) => {
    Swal.fire({
        icon: "success",
        title: "Success"
    })
})
document.getElementById('error').addEventListener('click', (e) => {
    Swal.fire({
        icon: "error",
        title: "Error"
    })
})
document.getElementById('warning').addEventListener('click', (e) => {
    Swal.fire({
        icon: "warning",
        title: "Warning"
    })
})
document.getElementById('info').addEventListener('click', (e) => {
    Swal.fire({
        icon: "info",
        title: "Info"
    })
})
document.getElementById('question').addEventListener('click', (e) => {
    Swal.fire({
        icon: "question",
        title: "Question"
    })
})