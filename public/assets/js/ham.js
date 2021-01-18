//Animate Hamburger menu on every page where the <nav class="hamburger"> hive exsists
function hamslidein(){																				//SlideIn function for easy calling
    let img="<img src='assets/ic_close_black_1024px.svg'></img>"
    $(".hampost").show().animate({left:0},300)
    $(".hampre").toggleClass("active")

    /*$(".hampost").find("a").each(function(){														//Dynamically set "curr Page" dot by comparing file name with pathname
        if($(this).attr("href")==location.pathname.split('/').slice(-1)[0]){
            $(this).addClass("curr")
        }
        else if(location.pathname.split('/').slice(-1)[0]===""){
            $(".hampost").find("a").first().addClass("curr")
        }
    })*/
}
function hamslideoff(){																				//SlideOut function for easy calling
    $(".hampost").animate({left: "-100%"}, 300,function(){$(this).hide()})
    $(".hampre").removeClass("active")
}
jQuery(function($, undefined){
    $(function(){
        $(".hampre").click(function(){																		//click listener on hamburger ico
            if(!($(".hampost").is(":visible"))){
                hamslidein()
            }
            else{
                hamslideoff()
            }
        })
        $("html").on("keydown", function(_e){																//call SlideOut() on "esc" press for convenience
            switch(_e.key){
                case "Escape":
                    if($(".hampost").is(":visible")){
                        hamslideoff()
                        break
                    }
                    else if($(".hampost").is(":hidden")){
                        hamslidein()
                        break
                    }
            }
        })
        $("main").click(function(){
            hamslideoff()
        })
        // $(".hampre").trigger("click");
    })
})
