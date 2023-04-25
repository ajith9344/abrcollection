import React from 'react'
import './App.css'

function App() {
	return (
		<form>
  <h1>
    <center>
      ABR collection
      <center />
    </center>
  </h1>
  <section>
    <h2>
      <center>
        Customer Add
        <center />
      </center>
    </h2>
    <div className="container">
      <div className="first-column">
        <div>
          <label htmlFor="customername">Customer Name</label>
          <input type="text" name="customername" id="customername" />
        </div>
        <div>
          <label htmlFor="account">Account</label>
          <input type="text" name="account" id="account" />
        </div>
        <div>
          <label htmlFor="password">Password</label>
          <input type="text" name="password" id="password" />
        </div>
        <div>
          <label htmlFor="noofconn">No Of Connection</label>
          <input type="number" name="noofconnection" id="noofconn" />
        </div>
        <div>
          <label htmlFor="rental">Web/Sim Rental</label>
          <input type="text" name="rental" id="rental" />
        </div>
        <div>
          <label htmlFor="total">Total</label>
          <input type="number" name="total" id="total" />
        </div>
      </div>
      <div className="second-column">
        <div>
          <label htmlFor="server">Server</label>
          <select name="server" id="server">
            <option>Select Server</option>
            <option>SIM</option>
            <option>SMART</option>
            <option>GPS</option>
          </select>
        </div>
        <div>
          <label htmlFor="username">User Name</label>
          <input type="text" name="username" id="username" />
        </div>
        <div>
          <label htmlFor="decivetype">Device type</label>
          <div style={{ width: "50%" }}>
            <select name="server" id="server" style={{ width: "100%" }}>
              <option>Select Device Type</option>
              <option>Sim</option>
              <option>Device</option>
              <option>Attendance</option>
            </select>
            <select
              name="server"
              id="server"
              style={{ display: "block", width: "100%", marginTop: 30 }}
            >
              <option>Select Network</option>
              <option>Airtel</option>
              <option>Vodafone</option>
              <option>Idea</option>
            </select>
          </div>
        </div>
        <div>
          <label htmlFor="phno">Phone</label>
          <input type="text" name="phonenumber" id="phno" />
        </div>
        <div>
          <label htmlFor="address">Address</label>
          <input type="textbox" name="address" id="address" />
        </div>
        <div>
          <label htmlFor="remark">Remark</label>
          <textarea id="" name="" rows={4} cols={35} defaultValue={"\n"} />
        </div>
      </div>
    </div>
    <div className="btn">
      <button> ADD</button>
      <button className="cl">CANCEL</button>
    </div>
  </section>
</form>

	)
}

export default App
