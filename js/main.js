let img_block = document.querySelector('.article__img');
let img=document.querySelector('.article__img img');
img_block.addEventListener('click',function(event){
    if(img_block.classList.contains("active")){
        if(event.target==img)
             event.preventDefault();
        else img_block.classList.remove('active')    
    }
    else img_block.classList.add('active')
})