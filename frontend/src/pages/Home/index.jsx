import Header from "../components/Header";
import Navbar from "../components/Navbar";
import Footer from "../components/Footer";
import CourseCard from "../components/CourseCard";

function Home() {

  return (
    <>
      <Header />

      <Navbar />

      <main>

        <h1>به آموزشگاه داده نگر خوش آمدید</h1>

        <CourseCard
          title="دوره آموزش PHP"
          teacher="علی احمدی"
          price="2,000,000"
        />

        <CourseCard
          title="دوره آموزش Laravel"
          teacher="محمد رضایی"
          price="3,000,000"
        />

      </main>

      <Footer />
    </>
  );
}

export default Home;