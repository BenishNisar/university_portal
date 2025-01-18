@extends('Layout.Dashboard_Layout')

@section('AdminContent')




<div class="container">
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">My Course Details</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h6>Hours Taught  (48)</h6>
                </div>
                <div class="col-6">
                    <h6>Remaining   (12)</h6>
                </div>

                <div class="col-6">
                    <h6>Mid Term Marks (30)</h6>
                </div>
                <div class="col-6">
                    <h6>Final Term Marks (50)</h6>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <div class="row py-3">
        <div class="col-6">
            <h3>My Courses</h3>
        </div>

        <div class="col-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>S. No</th>
                        <th>Semester</th>
                        <th>Course Code</th>
                        <th>Course Title</th>
                        <th>Details</th>
                         </tr>
                </thead>

                <tbody>
        <tr><td>1</td><td>1</td><td>CS-107</td><td>Introduction to Info. & Comm. Technologies</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" >View Detail</a></td></tr>
        <tr><td>2</td><td>1</td><td>CS-107A</td><td>Introduction to Info. & Comm. Technologies (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>3</td><td>1</td><td>CS-104</td><td>Programming Fundamentals</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>4</td><td>1</td><td>CS-104A</td><td>Programming Fundamentals (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>5</td><td>1</td><td>NS-109</td><td>Calculus And Analytical Geometry</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>6</td><td>1</td><td>NS-106</td><td>Applied Physics</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>7</td><td>1</td><td>NS-106A</td><td>Applied Physics (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>8</td><td>1</td><td>HS-100</td><td>English Composition & Comprehension</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>9</td><td>1</td><td>HS-101/HS-102</td><td>Islamic Studies/Ethical Behavior</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>10</td><td>2</td><td>CS-112</td><td>Object Oriented Programming</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>11</td><td>2</td><td>CS-112A</td><td>Object Oriented Programming (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>12</td><td>2</td><td>EE-100</td><td>Digital Logic Design</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>13</td><td>2</td><td>EE-100A</td><td>Digital Logic Design (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>14</td><td>2</td><td>HS-103</td><td>Pakistan Studies</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>15</td><td>2</td><td>HS-114</td><td>Communication and Presentation Skills</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>16</td><td>2</td><td>NS-110</td><td>Linear Algebra</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>17</td><td>2</td><td>CS-102</td><td>Web Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>18</td><td>2</td><td>CS-102A</td><td>Web Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>19</td><td>3</td><td>CS-211</td><td>Data Structures and Algorithms</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>20</td><td>3</td><td>CS-211A</td><td>Data Structures and Algorithms (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>21</td><td>3</td><td>CS-203</td><td>Computer Communication Networks</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>22</td><td>3</td><td>CS-203A</td><td>Computer Communication Networks (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>23</td><td>3</td><td>HS-231</td><td>Technical Report Writing</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>24</td><td>3</td><td>SE-231</td><td>Introduction to Software Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>25</td><td>3</td><td>SE-231A</td><td>Introduction to Software Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>26</td><td>3</td><td>NS-206</td><td>Probability and Statistics</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>27</td><td>3</td><td>CS-213</td><td>Introduction to Database System</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>28</td><td>3</td><td>CS-213A</td><td>Introduction to Database System (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>29</td><td>4</td><td>CS-234</td><td>Operating Systems</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>30</td><td>4</td><td>CS-234A</td><td>Operating Systems (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>31</td><td>4</td><td>SE-232</td><td>Software Construction and Development</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>32</td><td>4</td><td>SE-232A</td><td>Software Construction and Development (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>33</td><td>4</td><td>CS-235</td><td>Artificial Intelligence</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>34</td><td>4</td><td>CS-235A</td><td>Artificial Intelligence (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>35</td><td>4</td><td>SE-243</td><td>Software Design and Architecture</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>36</td><td>4</td><td>SE-243A</td><td>Software Design and Architecture (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>37</td><td>4</td><td>SE-212</td><td>Software Quality Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>38</td><td>4</td><td>SE-212A</td><td>Software Quality Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>39</td><td>4</td><td>HS-207</td><td>Psychology</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>40</td><td>5</td><td>MS-303</td><td>Human Resource Management</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>41</td><td>5</td><td>SE-355</td><td>Software Testing and Automation</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>42</td><td>5</td><td>SE-355A</td><td>Software Testing and Automation (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>43</td><td>5</td><td>SE-351</td><td>Software Re-Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>44</td><td>5</td><td>SE-351A</td><td>Software Re-Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>45</td><td>5</td><td>HS-304</td><td>Professional Practices</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>46</td><td>5</td><td>MS-304</td><td>Entrepreneurship and Leadership</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>47</td><td>6</td><td>HS-305</td><td>Ideology and constitution of Pakistan</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>48</td><td>6</td><td>SE-361</td><td>Final Year Project-I</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>49</td><td>6</td><td>MS-300</td><td>Software Project Management</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>50</td><td>6</td><td>SE-352</td><td>Modeling and Simulation</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>51</td><td>6</td><td>SE-352A</td><td>Modeling and Simulation (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>52</td><td>6</td><td>CS-3532</td><td>Mobile Application Development</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>53</td><td>6</td><td>CS-353A</td><td>Mobile Application Development (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>54</td><td>6</td><td>SE-331</td><td>Formal Methods in Software Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>55</td><td>6</td><td>SE-331A</td><td>Formal Methods in Software Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>56</td><td>7</td><td>SE-362</td><td>Final Year Project-II</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>57</td><td>7</td><td>MS-401</td><td>Organizational Behavior</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>58</td><td>7</td><td>SE-363</td><td>Requirements Engineering</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>59</td><td>7</td><td>SE-363A</td><td>Requirements Engineering (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>60</td><td>7</td><td>SE-453</td><td>Agile Software Development</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>61</td><td>7</td><td>SE-453A</td><td>Agile Software Development (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>62</td><td>7</td><td>CS-454</td><td>Cloud Computing</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>63</td><td>7</td><td>CS-454A</td><td>Cloud Computing (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>64</td><td>7</td><td>CS-457</td><td>Machine Learning</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>65</td><td>7</td><td>CS-457A</td><td>Machine Learning (Lab)</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>66</td><td>7</td><td>EE-464</td><td>Health, Safety and Environment</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>67</td><td>7</td><td>FT-401</td><td>Financial Technologies</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
        <tr><td>68</td><td>8</td><td>CPD-421</td><td>Supervised Industrial Training</td><td><a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">View Detail</a></td></tr>
    </tbody>

            </table>
        </div>


    </div>
</div>

@endsection
