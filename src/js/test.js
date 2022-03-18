function navHTML(data) {
    const nav_items = data.acf.navigation;
    var markup = '';

    nav_items.forEach((nav_item) => {
        if (nav_item.acf_fc_layout == 'dropdown') {
            markup += `
            <li class="first-level">
              <a href="${nav_item.link.url}" class="first-level-link toggle"><span>${nav_item.link.title}</span><span class="toggle-icon"></span>
            </a>
            <ul class="second-level">`;

            for (i = 0; i < nav_item.sub_links.length; i++) {
                markup +=
                    `
                <li>
                  <a href="` +
                    nav_item.sub_links[i].link.url +
                    `"  class="second-level-link">` +
                    nav_item.sub_links[i].link.title +
                    `</a>
                </li>`;
            }

            markup += `
            </ul>
          </li>`;
        } else if (nav_item.acf_fc_layout == 'coming_soon') {
            markup += `<li class="first-level"><a href="${nav_item.link.url}" class="first-level-link coming-soon">${nav_item.link.title} <span class="coming-soon-label">${nav_item.coming_soon_label}</span></a></li>`;
        } else {
            markup += `<li class="first-level"><a href="${nav_item.link.url}" class="first-level-link">${nav_item.link.title}</a></li>`;
        }
    });

    document.getElementById('nav').innerHTML = markup;

    $('.first-level-link.toggle .toggle-icon').on('click', function () {
        var first_level_link = $(this).closest('.first-level-link.toggle');
        $(first_level_link).toggleClass('active');
        $(first_level_link).siblings('.second-level').toggleClass('active');
        return false;
    });

    $('.first-level-link.coming-soon').on('click', function () {
        return false;
    });
}

function promoHTML(data) {
    const promo = data.acf.promo;
    var markup = '';

    markup += `
        <div class="note">
          <p>${promo.text}</p>

          <div class="cta">
            <a href="${promo.link}" target="_blank"><img src="${promo.image.url}" alt="${promo.image.alt}" /></a>
          </div>
        </div>
      `;

    document.getElementById('promo').innerHTML = markup;
}

var endpoint =
    'https://heavygoods.andrewlovseth.com/?rest_route=/wp/v2/pages/8';
var ourRequest = new XMLHttpRequest();
ourRequest.open('GET', endpoint);
ourRequest.onload = function () {
    if (ourRequest.status >= 200 && ourRequest.status < 400) {
        var data = JSON.parse(ourRequest.responseText);
        navHTML(data);
        promoHTML(data);
    } else {
        console.log('We connected to the server, but it returned an error.');
    }
};

ourRequest.onerror = function () {
    console.log('Connection error');
};

ourRequest.send();
