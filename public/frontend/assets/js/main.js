'use strict';

document.addEventListener('DOMContentLoaded', function () {
  const tabMenus = document.querySelectorAll('.tab__item');
  const tabContents = document.querySelectorAll('.menu');

  tabMenus.forEach((tabMenu) => {
    tabMenu.addEventListener('click', tabSwitch);
  });

  function tabSwitch(e) {
    const tabTargetData = e.currentTarget.dataset.tab;

    tabContents.forEach((tabContent) => {
      tabContent.classList.remove('is-active');
    });

    const tabContentToShow = document.querySelector(`[data-panel="${tabTargetData}"]`);
    tabContentToShow.classList.add('is-active');
  }
});
