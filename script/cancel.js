cancel=document.querySelector('.cancel')
customers=document.querySelector('.customers')
view=document.querySelector('.btn')




cancel.addEventListener('click',()=>{
    customers.classList.add('margin')
    customers.classList.toggle('visionon')
    
    

})
view.addEventListener('click',()=>{
    customers.classList.remove('margin')
    customers.classList.add('visionon')
    cancel.classList.toogle('visionon')
})


