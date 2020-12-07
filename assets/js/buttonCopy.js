function copy(){
    const content = document.querySelector('#senha');
    content.select();

    document.execCommand('copy');
}
