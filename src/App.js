import React, { useState, useEffect } from 'react';
import {
  Bell,
  Briefcase,
  Home,
  LogOut,
  User,
  Users,
  CheckCircle,
  XCircle,
  PlusCircle,
  Search,
  MapPin,
  Tag,
  Settings,
} from 'lucide-react';

// Main App Component - The entire application is contained here.
export default function App() {
  // Use state to manage the current user and their role
  const [currentUser, setCurrentUser] = useState(null);
  const [page, setPage] = useState('home');
  const [selectedJob, setSelectedJob] = useState(null);

  // A simulated database (local state) to store jobs, applications, and users
  const [users, setUsers] = useState([
    { id: 1, name: 'Candidate User', email: 'candidate@test.com', role: 'candidate' },
    { id: 2, name: 'Employer User', email: 'employer@test.com', role: 'employer' },
    { id: 3, name: 'Admin User', email: 'admin@test.com', role: 'admin' },
  ]);

  const [jobs, setJobs] = useState([
    {
      id: 1,
      title: 'Senior Software Engineer',
      location: 'Cairo',
      category: 'Technology',
      description: 'We are looking for a senior engineer...',
      isApproved: true,
      employerId: 2,
    },
    {
      id: 2,
      title: 'Marketing Manager',
      location: 'Giza',
      category: 'Marketing',
      description: 'Join our marketing team...',
      isApproved: true,
      employerId: 2,
    },
    {
      id: 3,
      title: 'Accountant',
      location: 'Alexandria',
      category: 'Finance',
      description: 'Seeking a qualified accountant...',
      isApproved: false,
      employerId: 2,
    },
  ]);

  const [applications, setApplications] = useState([
    { id: 1, userId: 1, jobId: 1, status: 'pending' },
  ]);

  // A simulated login function
  const handleLogin = (role) => {
    const user = users.find((u) => u.role === role);
    setCurrentUser(user);
    if (user.role === 'candidate') {
      setPage('candidate-dashboard');
    } else if (user.role === 'employer') {
      setPage('employer-dashboard');
    } else if (user.role === 'admin') {
      setPage('admin-dashboard');
    }
  };

  // A simulated logout function
  const handleLogout = () => {
    setCurrentUser(null);
    setPage('home');
  };

  // Utility function to get user's applied jobs
  const getAppliedJobs = () => {
    if (!currentUser || currentUser.role !== 'candidate') return [];
    const appliedJobIds = applications
      .filter((app) => app.userId === currentUser.id)
      .map((app) => app.jobId);
    return jobs.filter((job) => appliedJobIds.includes(job.id));
  };

  // Utility function to get employer's jobs
  const getMyJobs = () => {
    if (!currentUser || currentUser.role !== 'employer') return [];
    return jobs.filter((job) => job.employerId === currentUser.id);
  };

  // Utility function to get unapproved jobs for admin
  const getUnapprovedJobs = () => {
    if (!currentUser || currentUser.role !== 'admin') return [];
    return jobs.filter((job) => !job.isApproved);
  };

  // Renders the correct page based on the state
  const renderPage = () => {
    switch (page) {
      case 'home':
        return <HomePage onLogin={handleLogin} />;
      case 'candidate-dashboard':
        return <CandidateDashboard user={currentUser} appliedJobs={getAppliedJobs()} />;
      case 'employer-dashboard':
        return (
          <EmployerDashboard
            user={currentUser}
            myJobs={getMyJobs()}
            onCreateJob={(newJob) => {
              setJobs([...jobs, { ...newJob, id: jobs.length + 1, isApproved: false }]);
              setPage('employer-dashboard');
            }}
          />
        );
      case 'admin-dashboard':
        return (
          <AdminDashboard
            user={currentUser}
            unapprovedJobs={getUnapprovedJobs()}
            onApprove={(jobId) => {
              setJobs(
                jobs.map((job) => (job.id === jobId ? { ...job, isApproved: true } : job)),
              );
            }}
            onReject={(jobId) => {
              setJobs(jobs.filter((job) => job.id !== jobId));
            }}
          />
        );
      case 'job-details':
        return (
          <JobDetails
            job={selectedJob}
            onApply={() => {
              const newApplication = {
                id: applications.length + 1,
                userId: currentUser.id,
                jobId: selectedJob.id,
                status: 'pending',
              };
              setApplications([...applications, newApplication]);
              alert('تم تقديم طلبك بنجاح!');
            }}
          />
        );
      case 'job-search':
        return <JobSearch jobs={jobs.filter((job) => job.isApproved)} onSelectJob={setSelectedJob} onChangePage={setPage} />;
      default:
        return <HomePage onLogin={handleLogin} />;
    }
  };

  // The main layout of the application with a navigation bar
  return (
    <div className="min-h-screen bg-gray-100 font-inter">
      <header className="bg-white shadow">
        <nav className="container mx-auto px-4 py-4 flex justify-between items-center">
          <div className="flex items-center space-x-4">
            <h1 className="text-xl font-bold text-blue-600">
              <a href="#" onClick={() => setPage('home')}>
                Jobs Portal
              </a>
            </h1>
            <a href="#" className="flex items-center text-gray-700 hover:text-blue-600 transition-colors" onClick={() => setPage('job-search')}>
              <Briefcase className="w-5 h-5 mr-1" />
              <span>Job Search</span>
            </a>
          </div>
          <div className="flex items-center space-x-4">
            {currentUser ? (
              <>
                <div className="flex items-center space-x-2">
                  <User className="w-5 h-5 text-gray-500" />
                  <span className="text-gray-700">مرحباً, {currentUser.name}</span>
                  <span className="text-sm font-semibold text-blue-600">({currentUser.role})</span>
                </div>
                <button
                  onClick={handleLogout}
                  className="flex items-center px-3 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors"
                >
                  <LogOut className="w-5 h-5 mr-1" />
                  <span>تسجيل خروج</span>
                </button>
              </>
            ) : (
              <a
                href="#"
                onClick={() => setPage('home')}
                className="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors"
              >
                تسجيل الدخول
              </a>
            )}
          </div>
        </nav>
      </header>

      <main className="container mx-auto px-4 py-8">
        {renderPage()}
      </main>

      {/* Tailwind CSS Script, no need to import in React apps */}
    </div>
  );
}

// Home Page Component
function HomePage({ onLogin }) {
  return (
    <div className="text-center bg-white p-8 rounded-lg shadow-md">
      <h2 className="text-3xl font-bold text-gray-800 mb-4">Welcome to Job Portal</h2>
      <p className="text-gray-600 mb-6">
        Please select your role to login and access the corresponding dashboard.
      </p>
      <div className="flex justify-center space-x-4">
        <button
          onClick={() => onLogin('candidate')}
          className="flex items-center px-6 py-3 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition-colors"
        >
          <User className="w-5 h-5 mr-2" />
          Login as Candidate
        </button>
        <button
          onClick={() => onLogin('employer')}
          className="flex items-center px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition-colors"
        >
          <Briefcase className="w-5 h-5 mr-2" />
          Login as Employer
        </button>
        <button
          onClick={() => onLogin('admin')}
          className="flex items-center px-6 py-3 bg-red-600 text-white rounded-lg shadow hover:bg-red-700 transition-colors"
        >
          <Settings className="w-5 h-5 mr-2" />
          Login as Admin
        </button>
      </div>
    </div>
  );
}

// Job Search Page Component
function JobSearch({ jobs, onSelectJob, onChangePage }) {
  const [keyword, setKeyword] = useState('');
  const [location, setLocation] = useState('');
  const [category, setCategory] = useState('');

  const filteredJobs = jobs.filter((job) => {
    const matchesKeyword =
      job.title.toLowerCase().includes(keyword.toLowerCase()) ||
      job.description.toLowerCase().includes(keyword.toLowerCase());
    const matchesLocation = location ? job.location === location : true;
    const matchesCategory = category ? job.category === category : true;
    return matchesKeyword && matchesLocation && matchesCategory;
  });

  const locations = [...new Set(jobs.map((job) => job.location))];
  const categories = [...new Set(jobs.map((job) => job.category))];

  return (
    <div>
      <h2 className="text-3xl font-bold text-gray-800 mb-6 text-center">Find Your Dream Job</h2>
      <div className="bg-white p-6 rounded-lg shadow-md mb-8">
        <form className="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
          <div className="col-span-1 md:col-span-2">
            <label className="block text-sm font-medium text-gray-700 mb-1">Keyword</label>
            <div className="relative">
              <Search className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" />
              <input
                type="text"
                className="w-full px-10 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500"
                placeholder="Job title, keywords..."
                value={keyword}
                onChange={(e) => setKeyword(e.target.value)}
              />
            </div>
          </div>
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">Location</label>
            <div className="relative">
              <MapPin className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" />
              <select
                className="w-full px-10 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500"
                value={location}
                onChange={(e) => setLocation(e.target.value)}
              >
                <option value="">All Locations</option>
                {locations.map((loc) => (
                  <option key={loc} value={loc}>
                    {loc}
                  </option>
                ))}
              </select>
            </div>
          </div>
          <div>
            <label className="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <div className="relative">
              <Tag className="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400" />
              <select
                className="w-full px-10 py-2 border rounded-lg focus:ring focus:ring-blue-200 focus:border-blue-500"
                value={category}
                onChange={(e) => setCategory(e.target.value)}
              >
                <option value="">All Categories</option>
                {categories.map((cat) => (
                  <option key={cat} value={cat}>
                    {cat}
                  </option>
                ))}
              </select>
            </div>
          </div>
        </form>
      </div>
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        {filteredJobs.length > 0 ? (
          filteredJobs.map((job) => (
            <div key={job.id} className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
              <h3 className="text-xl font-bold text-gray-800 mb-2">{job.title}</h3>
              <p className="text-gray-500 flex items-center mb-1">
                <MapPin className="w-4 h-4 mr-2" />
                {job.location}
              </p>
              <p className="text-gray-500 flex items-center mb-4">
                <Tag className="w-4 h-4 mr-2" />
                {job.category}
              </p>
              <p className="text-gray-600 text-sm mb-4 line-clamp-3">{job.description}</p>
              <button
                onClick={() => {
                  onSelectJob(job);
                  onChangePage('job-details');
                }}
                className="w-full bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition-colors"
              >
                View Details
              </button>
            </div>
          ))
        ) : (
          <div className="col-span-full text-center py-10 text-gray-500">
            <p>No jobs found matching your criteria.</p>
          </div>
        )}
      </div>
    </div>
  );
}

// Job Details Page Component
function JobDetails({ job, onApply }) {
  if (!job) return <div className="text-center text-gray-500">Job not found.</div>;
  return (
    <div className="bg-white p-8 rounded-lg shadow-md">
      <h2 className="text-3xl font-bold text-gray-800 mb-4">{job.title}</h2>
      <div className="flex items-center text-gray-600 mb-2">
        <MapPin className="w-5 h-5 mr-2" />
        <span className="font-semibold">{job.location}</span>
      </div>
      <div className="flex items-center text-gray-600 mb-6">
        <Tag className="w-5 h-5 mr-2" />
        <span className="font-semibold">{job.category}</span>
      </div>
      <p className="text-gray-700 leading-relaxed mb-6">{job.description}</p>
      <button
        onClick={onApply}
        className="px-6 py-3 bg-green-600 text-white rounded-lg shadow hover:bg-green-700 transition-colors"
      >
        Apply Now
      </button>
    </div>
  );
}

// Candidate Dashboard Component
function CandidateDashboard({ user, appliedJobs }) {
  return (
    <div className="bg-white p-8 rounded-lg shadow-md">
      <h2 className="text-3xl font-bold text-gray-800 mb-6">Candidate Dashboard</h2>
      <p className="text-gray-600 mb-4">مرحباً، {user.name}. هذا هو سجل طلباتك.</p>
      <div className="mt-6">
        <h3 className="text-xl font-semibold text-gray-800 mb-4">Applied Jobs</h3>
        {appliedJobs.length > 0 ? (
          <ul className="space-y-4">
            {appliedJobs.map((job) => (
              <li key={job.id} className="bg-gray-50 p-4 rounded-lg shadow-sm flex justify-between items-center">
                <div>
                  <h4 className="font-bold text-gray-800">{job.title}</h4>
                  <p className="text-sm text-gray-500">Location: {job.location}</p>
                </div>
                <span className="text-sm font-semibold text-blue-600">Pending</span>
              </li>
            ))}
          </ul>
        ) : (
          <p className="text-gray-500 text-center">You have not applied for any jobs yet.</p>
        )}
      </div>
    </div>
  );
}

// Employer Dashboard Component
function EmployerDashboard({ user, myJobs, onCreateJob }) {
  const [showCreateForm, setShowCreateForm] = useState(false);
  const [newJob, setNewJob] = useState({ title: '', location: '', category: '', description: '' });

  const handleCreateJob = (e) => {
    e.preventDefault();
    onCreateJob(newJob);
    setNewJob({ title: '', location: '', category: '', description: '' });
    setShowCreateForm(false);
  };

  return (
    <div className="bg-white p-8 rounded-lg shadow-md">
      <h2 className="text-3xl font-bold text-gray-800 mb-6">Employer Dashboard</h2>
      <p className="text-gray-600 mb-4">مرحباً، {user.name}. هذه هي الوظائف التي قمتَ بنشرها.</p>
      <div className="flex justify-end mb-4">
        <button
          onClick={() => setShowCreateForm(!showCreateForm)}
          className="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors flex items-center"
        >
          <PlusCircle className="w-5 h-5 mr-2" />
          {showCreateForm ? 'Cancel' : 'Post New Job'}
        </button>
      </div>

      {showCreateForm && (
        <div className="bg-gray-50 p-6 rounded-lg shadow-inner mb-6">
          <h3 className="text-xl font-semibold text-gray-800 mb-4">Post a New Job</h3>
          <form onSubmit={handleCreateJob} className="space-y-4">
            <div>
              <label className="block text-sm font-medium text-gray-700">Job Title</label>
              <input
                type="text"
                className="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                value={newJob.title}
                onChange={(e) => setNewJob({ ...newJob, title: e.target.value })}
                required
              />
            </div>
            <div>
              <label className="block text-sm font-medium text-gray-700">Location</label>
              <input
                type="text"
                className="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                value={newJob.location}
                onChange={(e) => setNewJob({ ...newJob, location: e.target.value })}
                required
              />
            </div>
            <div>
              <label className="block text-sm font-medium text-gray-700">Category</label>
              <input
                type="text"
                className="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                value={newJob.category}
                onChange={(e) => setNewJob({ ...newJob, category: e.target.value })}
                required
              />
            </div>
            <div>
              <label className="block text-sm font-medium text-gray-700">Description</label>
              <textarea
                className="mt-1 block w-full rounded-lg border-gray-300 shadow-sm"
                rows="4"
                value={newJob.description}
                onChange={(e) => setNewJob({ ...newJob, description: e.target.value })}
                required
              ></textarea>
            </div>
            <button
              type="submit"
              className="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors"
            >
              Post Job
            </button>
          </form>
        </div>
      )}

      <h3 className="text-xl font-semibold text-gray-800 mb-4">My Job Listings</h3>
      {myJobs.length > 0 ? (
        <ul className="space-y-4">
          {myJobs.map((job) => (
            <li key={job.id} className="bg-gray-50 p-4 rounded-lg shadow-sm flex justify-between items-center">
              <div>
                <h4 className="font-bold text-gray-800">{job.title}</h4>
                <p className="text-sm text-gray-500">Status: {job.isApproved ? 'Approved' : 'Pending Approval'}</p>
              </div>
              <span className={`text-sm font-semibold ${job.isApproved ? 'text-green-600' : 'text-yellow-600'}`}>
                {job.isApproved ? 'Approved' : 'Pending'}
              </span>
            </li>
          ))}
        </ul>
      ) : (
        <p className="text-gray-500 text-center">You have not posted any jobs yet.</p>
      )}
    </div>
  );
}

// Admin Dashboard Component
function AdminDashboard({ user, unapprovedJobs, onApprove, onReject }) {
  return (
    <div className="bg-white p-8 rounded-lg shadow-md">
      <h2 className="text-3xl font-bold text-gray-800 mb-6">Admin Dashboard</h2>
      <p className="text-gray-600 mb-4">مرحباً، {user.name}. هذه هي الوظائف التي تنتظر الموافقة.</p>
      <h3 className="text-xl font-semibold text-gray-800 mb-4">Jobs Pending Approval</h3>
      {unapprovedJobs.length > 0 ? (
        <ul className="space-y-4">
          {unapprovedJobs.map((job) => (
            <li key={job.id} className="bg-gray-50 p-4 rounded-lg shadow-sm flex items-center justify-between">
              <div>
                <h4 className="font-bold text-gray-800">{job.title}</h4>
                <p className="text-sm text-gray-500">{job.location} | {job.category}</p>
                <p className="text-sm text-gray-500 mt-1 line-clamp-2">{job.description}</p>
              </div>
              <div className="flex items-center space-x-2">
                <button
                  onClick={() => onApprove(job.id)}
                  className="p-2 text-green-600 hover:text-green-800 transition-colors"
                  title="Approve"
                >
                  <CheckCircle className="w-6 h-6" />
                </button>
                <button
                  onClick={() => onReject(job.id)}
                  className="p-2 text-red-600 hover:text-red-800 transition-colors"
                  title="Reject"
                >
                  <XCircle className="w-6 h-6" />
                </button>
              </div>
            </li>
          ))}
        </ul>
      ) : (
        <p className="text-gray-500 text-center">No jobs pending approval.</p>
      )}
    </div>
  );
}
