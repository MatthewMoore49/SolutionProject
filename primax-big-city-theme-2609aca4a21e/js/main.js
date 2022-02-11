;( function () {
    
    var pageSettings = {
        desktop         : false,
    }
    
    var expApp = {
        
        settings : pageSettings,

        isDesktop: function () {
            return this.settings.desktop
        },
        mobileNav: function(){
            // mobile nav trigger
            var nav = document.querySelector('.navbar')
            var toggler = document.querySelector('.navbar-toggler')

            toggler.addEventListener('click', (e) => {
                nav.classList.toggle('navbar-active');
                return false;
            })
        },
        faqAccordions: function(){
            let faqBtns = document.querySelectorAll('.accordion-question');

            for (let i = 0; i < faqBtns.length; i++) {
                faqBtns[i].addEventListener('click', function() {

                    if (faqBtns[i].classList.contains('active')) {
                        faqBtns[i].nextElementSibling.classList.remove('open');
                        setTimeout(function(){
                            faqBtns[i].classList.toggle('active');
                            faqBtns[i].nextElementSibling.classList.toggle('active');
                        }, 50)
                    } else {
                        setTimeout(function(){
                            faqBtns[i].nextElementSibling.classList.add('open');
                        }, 500)
                        faqBtns[i].classList.toggle('active');
                        faqBtns[i].nextElementSibling.classList.toggle('active');
                    }
                });
            }

            //need to get height again on resize
            let faqAnswers = document.querySelectorAll('.accordion-answer');
            let faqAnswersContent = document.querySelectorAll('.accordion-answer-content');
            for (let i = 0; i < faqAnswers.length; i++) {
                faqAnswers[i].style.height = faqAnswersContent[i].clientHeight + 30 + 'px';
            }
        },
        screenResizeLive: function (){
            var resizeTimer;
        	window.addEventListener('resize', () => {
        		clearTimeout(resizeTimer);
                resizeTimer = setTimeout(() => {
                    // functions here on resize

                }, 250);
        	})
        },
        screenResizeCheck: function (){
            if(window.innerWidth <= 991 && expApp.settings.desktop == true) {
                expApp.settings.desktop = false;
                // add mobile only functions below

            } else if (window.innerWidth > 991 && expApp.settings.desktop == false) {
               expApp.settings.desktop = true;
               // add desktop only functions below

            }
        },
        
        init: function () {
            //ON LOAD
            // Desktop and mobile
            if (window.innerWidth > 991) expApp.settings.desktop = true;
            window.addEventListener('resize', this.screenResizeCheck)
            this.screenResizeLive();
            this.mobileNav();
            this.faqAccordions()


            if ( this.isDesktop() ) { 
                // Desktop only 

            } else {
                // Mobile Only

            }

            return this;
        }
    }
    window.expApp = expApp
})();

window.addEventListener('load', function() {
    expApp.init()
})