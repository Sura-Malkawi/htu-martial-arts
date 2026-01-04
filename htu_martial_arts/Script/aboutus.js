let instructors = document.querySelectorAll(".instructor-card");

instructors.forEach(function (card) 
{
    let tooltip = card.querySelector(".tooltip");

    card.addEventListener("mouseenter", function () 
    {
        tooltip.style.display = "block";
    }
);

    card.addEventListener("mouseleave", function () 
    {
        tooltip.style.display = "none";
    }
);
}
);