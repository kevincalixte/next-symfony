import Image from "next/image";
import Dashboard from "./components/Dashboard/Dashboard";

export default async function Home() {

  return (
    <div className="m-5">
      <Dashboard/>
    </div>
  );
}
