import React from 'react'

const main = [
    "[&_h1]:text-red-500",
    "[&_h2]:text-blue-500",
    "h-screen p-5 flex gap-3",
    "bg-black/90 text-white rounded-xl",
].join(" ")

const left = [
    "w-1/8",
].join(" ")

const right = [
    "w-full",
].join(" ")

const login = [
    "flex flex-col items-center justify-evenly",
    "h-12 w-full block",
    "bg-white text-black text-xs rounded-sm",
    "cursor-pointer hover:bg-white/90",
].join(" ")

interface User {
    logo: string;
    name: string;
    email: string;
}
async function getUser() {

const res = await fetch("http://localhost:8000/api/users/me", {
    cache: "no-store",
  });
  if (!res.ok) throw new Error("Erreur lors du chargement de l'utilisateur");
  return res.json();
}

const Dashboard = async () => {
  const user: User = await getUser()
  console.log(user)
  return (
    <div className={`${main}`}>
      <section className={`${left}`}>
        <div className={`${login}`}>     
            <span>
               Bonjour {user.name}
            </span>
            <span>
                {user.email}
            </span>
        </div>
      </section>
      <section className={`${right}`}>
       X
      </section>
    </div>
  )
}

export default Dashboard
