const showAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');

  // показываем форму и оверлей
  formContainer.style.display = 'block';

  // запускаем анимацию
  formContainer.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });

  overlay.style.display = 'block';

  // обработчик клика на оверлее
  overlay.addEventListener('click', hideAddRecordForm);
}

const hideAddRecordForm = () => {
  const formContainer = document.querySelector('#add-record-form-container');
  const overlay = document.querySelector('#overlay');

  // скрываем форму и оверлей
  formContainer.style.display = 'none';
  overlay.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const addRecordButton = document.querySelector('#add-record-button');
addRecordButton.addEventListener('click', showAddRecordForm);

//// forma 2

  function showChangeRecordForm(button) {
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');

  // показываем форму и оверлей
  formContainer2.style.display = 'block';

  // запускаем анимацию
  formContainer2.animate([
    { height: '0', opacity: '0' },
    { height: 'auto', opacity: '1' }
  ], {
    duration: 500   ,
    easing: 'ease-out',
    fill: 'forwards'
  });
  const parentElement = button.parentNode.parentNode;
  var table = parentElement.parentNode;
  const childElements = parentElement.querySelectorAll('.table-td');
  var tdData = [];


  childElements.forEach(td => {
    tdData.push(td.innerHTML);
  })

  var inputs = document.querySelectorAll('.column-value');
  console.log(tdData);

  var i = 0;
  console.log(inputs)
  inputs.forEach(input => {
    input.setAttribute('value', tdData[i]);    
    i++;
  })

  overlay2.style.display = 'block';
  // обработчик клика на оверлее
  overlay2.addEventListener('click', hideChangeRecordForm);
}

const hideChangeRecordForm = () => {
  const formContainer2 = document.querySelector('#change-record-form-container');
  const overlay2 = document.querySelector('#overlay-2');

  // скрываем форму и оверлей
  formContainer2.style.display = 'none';
  overlay2.style.display = 'none';

  // удаляем обработчик клика на оверлее
  overlay2.removeEventListener('click', hideAddRecordForm);
}

// обрабочик клика на кнопке "Добавить запись"
const changeRecordButtons = document.querySelectorAll('.change-button');
changeRecordButtons.forEach(button => {
  button.addEventListener('click', function(){
    showChangeRecordForm(button);
  });
});

/// 3

const data = {

};

// const button = document.getElementById('change-record-button');
// button.addEventListener('click', sendRequest);

const changeRecordButtonsId = document.querySelectorAll('.change-form-send');
changeRecordButtonsId.forEach(button => {
  const parentElement = button.parentNode.parentNode;
  var table = parentElement.parentNode;
  const childElements = parentElement.querySelectorAll('.table-td');
  var tdData = [];


  childElements.forEach(td => {
    tdData.push(td.innerHTML);
  })

  

  //получить форму
  // получить инпуты этой формы
  // циклом пройтись по ним и заполнить инпуты

  button.addEventListener('click', () => sendRequest(button, tdData));
});

function sendRequest(button, tdData) {
  data.uid = button.getAttribute('data-uid');
  data.data = tdData;
  fetch('http://storage/Page2/Scripts/change_record.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(data)
  })
    .then(response => response.json())
    .then(data => console.log(data))
    .catch(error => {
      console.error(error);
      // здесь можно добавить обработку ошибок
    });
}
