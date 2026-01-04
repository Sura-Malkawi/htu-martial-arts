function toggleCard(card)
{
    const cards = document.getElementsByClassName("class-card");
    const details = card.querySelector(".details");

    if (details.style.display === "block") 
    {
        details.style.display = "none";
        return;
    }

    for (let i = 0; i < cards.length; i++) 
    {
        cards[i].querySelector(".details").style.display = "none";
    }

    details.style.display = "block";
}