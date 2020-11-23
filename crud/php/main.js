$(".btnedit").click( e => {
    let textvalues = displayData(e);

    let id = $("input[name*='habit_id']");
    let habitname = $("input[name*='habit_name']");

    id.val(textvalues[0]);
    habitname.val(textvalues[1]);

});

function displayData(e) {
    let id = 0;
    const td = $("#tbody tr td");
    let textvalues = [];
    
    // for (const value of td){
        
    //     if(value.dataset.id == e.target.dataset.id){
    //         console.log(value.dataset.id);
    //         textvalues[id++] = value.textContent;
    //     }
    // }
    
    // return textvalues;
    for (const value of td){
        if(value.dataset.id == e.target.dataset.id){
            // console.log(e.target.dataset.id);
            // console.log(value);
            textvalues[id++] = value.textContent;
        }
    }
    return textvalues;
}