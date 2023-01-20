
    const animateScroll = document.querySelector('animate__fadeInDown animate__fadeInLeft animate__fadeInRight')

    window.addEventListener("scroll", () => {
        if(scrollY => 40) {
            animateScroll.classList.add("animate__fadeInDown animate__fadeInLeft animate__fadeInRight")        
        }else {
            animateScroll.classList.remove("animate__fadeInDown animate__fadeInLeft animate__fadeInRight")
        }
    })