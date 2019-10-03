let current_options = 2;
let max_options = 6;

let add_option_button = document.querySelector("#new_option");
let create_vote_form = document.querySelector('#create_form');
let submit_button = document.querySelector('#submit_vote')
let option_code = document.querySelector('#option_code').cloneNode(true);

let add_option = () => {
    //console.log("cur: " + current_options + " | max: " + max_options);
    if (current_options < max_options) {
        current_options++;
        new_option = option_code.cloneNode(true);
        option_code.firstElementChild.setAttribute('for', "voteOption" + current_options);
        option_code.lastElementChild.firstElementChild.id = "voteOption" + current_options;
        option_code.lastElementChild.firstElementChild.name = "voteOption" + current_options;
        create_vote_form.appendChild(option_code);
        option_code = new_option;
    }
    if (current_options >= max_options) {
        add_option_button.remove();
    }
}

let submit_vote = () => {
    if (document.querySelector('#voteTitle').value == '') {
        document.querySelector('#errors').innerHTML = "You must enter a title";
        return;
    }
    if (document.querySelector('#voteOption1').value == '') {
        document.querySelector('#errors').innerHTML = "You must enter at least 2 options";
        return;
    }
    if (document.querySelector('#voteOption2').value == '') {
        document.querySelector('#errors').innerHTML = "You must enter at least 2 options";
        return;
    }
    create_vote_form.submit();
}

add_option_button.addEventListener('click', add_option);
submit_button.addEventListener('click', submit_vote);
