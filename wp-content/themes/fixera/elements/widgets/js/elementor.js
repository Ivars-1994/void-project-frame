( function( $ ) {
    "use strict"
    var pxl_widget_elementor_handler = function( $scope, $ ) {
        setTimeout(function(){
            $('.elementor > .elementor-element').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-parents"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-parents"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });
            $('.elementor-inner-section').each(function () {
                var _el_particle = $(this).find(".elementor-container .el-move-inner"),
                    _el_particle_remove = $(this).find(".elementor-widget-wrap .el-move-inner"),
                    _row_particle = $(this).find("> .elementor-container");
                _row_particle.before(_el_particle.clone());
                _el_particle_remove.remove();
            });
        }, 200);
        
        elementorFrontend.waypoint($scope.find('.pxl-image-single.skew-in'), function () {
            $(this).addClass('pxl-skew-in');
        });
    }
    function fixera_gsap_scroll_trigger($scope){ 
        gsap.registerPlugin(ScrollTrigger);
        const images = gsap.utils.toArray('img');  
        const showDemo = () => {
            document.body.style.overflow = 'auto';
            gsap.utils.toArray($scope.find('.pxl-horizontal-scroll .scroll-trigger')).forEach((section, index) => {
                const w = section;
                var x = w.scrollWidth * -1;
                var xEnd = 0;
                if($(section).closest('.pxl-horizontal-scroll').hasClass('revesal')){   
                    x = '100%';
                    xEnd = (w.scrollWidth - section.offsetWidth) * -1;
                } 
                gsap.fromTo(w, { x }, {
                    x: xEnd,
                    scrollTrigger: { 
                        trigger: section, 
                        scrub: 0.5 
                    }
                });
            });
        }
        showDemo();
    }

    function fixera_logo_marquee($scope){
        const logos = $scope.find('.pxl-item--marquee');
        gsap.set(logos, { autoAlpha: 1 })

        logos.each(function(index, el) {
            gsap.set(el, { xPercent: 100 * index });
        }); 

        if (logos.length > 2) {
            const logosWrap = gsap.utils.wrap(-100, ((logos.length - 1) * 100));
            const durationNumber = logos.data('duration');
            const slipType = logos.data('slip-type');
            var slipResult = `-=${logos.length * 100}`;
            if(slipType == 'right') {
                slipResult = `+=${logos.length * 100}`;
            }
            gsap.to(logos, {
                xPercent: slipResult,
                duration: durationNumber,
                repeat: -1,
                ease: 'none',
                modifiers: {
                    xPercent: xPercent => logosWrap(parseFloat(xPercent))
                }
            });
        }             
    }

    function fixera_split_text($scope){
        var st = $scope.find(".pxl-split-text");
        if(st.length == 0) return;
        gsap.registerPlugin(SplitText);
        st.each(function(index, el) {
            el.split = new SplitText(el, { 
                type: "lines,words,chars",
                linesClass: "split-line"
            });
            gsap.set(el, { perspective: 400 });

            if( $(el).hasClass('split-in-fade') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-right') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "50",
                    ease: "Back.easeOut",
                });
            }
            if( $(el).hasClass('split-in-left') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    x: "-50",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-up') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-down') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    y: "-80",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-rotate') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    rotateX: "50deg",
                    ease: "circ.out",
                });
            }
            if( $(el).hasClass('split-in-scale') ){
                gsap.set(el.split.chars, {
                    opacity: 0,
                    scale: "0.5",
                    ease: "circ.out",
                });
            }
            el.anim = gsap.to(el.split.chars, {
                scrollTrigger: {
                    trigger: el,
                    toggleActions: "restart pause resume reverse",
                    start: "top 90%",
                },
                x: "0",
                y: "0",
                rotateX: "0",
                scale: 1,
                opacity: 1,
                duration: 0.8, 
                stagger: 0.02,
            });
        });
    }
    $( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/global', pxl_widget_elementor_handler );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_heading.default', function( $scope ) { 
            fixera_split_text($scope); 
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_horizontal_scroll.default', function( $scope ) {
            fixera_gsap_scroll_trigger($scope);
        } );
        elementorFrontend.hooks.addAction( 'frontend/element_ready/pxl_logo_marquee.default', function( $scope ) {
            fixera_logo_marquee($scope);
        } );
    } );
} )( jQuery );