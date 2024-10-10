function RequestWater(){
    document.getElementById('waterRequestForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way
    
        alert("request water request")
      // Collect form data
      const fullName = document.getElementById('fullName').value;
      const numberOfBags = document.getElementById('numberOfBags').value;
      const deliveryDate = document.getElementById('deliveryDate').value;
      const phoneNumber = document.getElementById('phoneNumber').value;
      const email = document.getElementById('email').value;
      alert(`Testing request ${fullName} ${numberOfBags} ${deliveryDate} ${phoneNumber} ${email}`)
    
      // Prepare the email data
      const templateParams = {
          from_name: fullName,
          to_name: "Cobbiekay",
          message: `New water request:\n\nFull Name: ${fullName}\nNumber of Bags: ${numberOfBags}\nDelivery Date: ${deliveryDate}\nPhone Number: ${phoneNumber}\nEmail: ${email}`
      };
    
      // Send email using EmailJS
      emailjs.send('service_b3yk1vs', 'template_o8e8q6k', templateParams)
          .then(function(response) {
              alert('Request submitted successfully!');
              console.log('SUCCESS!', response.status, response.text);
          }, function(error) {
              alert('Failed to send request. Please try again later.');
              console.log('FAILED...', error);
          });
      });
      
}